<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bank account to eduubessa user
        $bank = new Bank();
        $bank->user_id = 1;
        $bank->display_name = "Conta Corrente";
        $bank->account_number = intval(microtime(true)) . "000" . intval(rand(100000, 900000));
        $bank->iban = "BARC300000" . intval(microtime(true)) . "" . intval(rand(100000, 900000));
        $bank->save();

        // Bank account to carolpintado user
        $bank = new Bank();
        $bank->user_id = 2;
        $bank->display_name = "Conta Corrente";
        $bank->account_number = intval(microtime(true)) . "000" .  intval(rand(100000, 900000));
        $bank->iban = "BARC300000" . intval(microtime(true)) . "" . intval(rand(100000, 900000));
        $bank->save();

        $bank = new Bank();
        $bank->user_id = 3;
        $bank->display_name = "Conta Corrente";
        $bank->account_number = intval(microtime(true)) . "000" .  intval(rand(100000, 900000));
        $bank->iban = "BARC300000" . intval(microtime(true)) . "" .  intval(rand(100000, 900000));
        $bank->save();

        $bank = new Bank();
        $bank->user_id = 3;
        $bank->display_name = "Conta de Empresa";
        $bank->account_number = intval(microtime(true)) . "000" . intval(rand(100000, 900000));
        $bank->iban = "BARC300000" . intval(microtime(true)) . "" . intval(rand(100000, 900000));
        $bank->save();

    }
}
