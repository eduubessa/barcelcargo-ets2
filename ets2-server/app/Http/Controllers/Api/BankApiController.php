<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferPostRequest;
use App\Models\Bank;
use App\Models\Extract;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BankApiController extends Controller
{
    //
    public function transfer(TransferPostRequest $request)
    {
        $user = 1; // Temporario

        $validated = $request->validated();

        if(!$validated){
            return back()->withErrors($validated);
        }

        $bank_sender = Bank::with('user')->where('user_id', $user)->firstOrFail();
        $bank_receiver = Bank::with('user')->where('iban', $request->input('iban'))->firstOrFail();

        if($bank_sender->account_number == $bank_receiver->account_number)
        {
            Log::error("Tentativa de transferência para a mesma conta! user_id=" . $user);
            dd("Não pode fazer transferência porque tem o mesmo IBAN!");
        }

        $balance_final_sender = floatval($bank_sender->balance)-floatval($request->input('amount'));
        $balance_final_receiver = floatval($bank_receiver->balance)+floatval($request->input('amount'));

        if($balance_final_sender < 0)
        {
            Log::error("Não tem saldo suficiente para fazer transferência");
            dd("Não pode fazer transferência, não tem saldo suficiente");
        }

        // Regista o envio da transferência
        $extract = new Extract();
        $extract->user_id = $user;
        $extract->description = $request->input("description");
        $extract->account_number_from = $bank_sender->account_number;
        $extract->account_number_to = $bank_receiver->account_number;
        $extract->amount = intval($request->input('amount'));
        $extract->balance_final = $balance_final_sender;
        $extract->save();

        $bank_sender = Bank::find($bank_sender->id);
        $bank_sender->balance = $balance_final_sender;
        $bank_sender->save();

        // Regista o recebimento da transferência
        $extract = new Extract();
        $extract->user_id = $bank_receiver->user->id;
        $extract->description = $request->input("description");
        $extract->account_number_from = $bank_sender->account_number;
        $extract->account_number_to = $bank_receiver->account_number;
        $extract->amount = intval($request->input('amount'));
        $extract->balance_final = $balance_final_receiver;
        $extract->save();

        $bank_receiver = Bank::find($bank_receiver->id);
        $bank_receiver->balance = $balance_final_receiver;
        $bank_receiver->save();

        return response()->json([
            "message" => "Transferência efectuada com sucesso!"
        ]);
    }
}
