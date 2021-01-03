<?php

namespace Database\Seeders;

use App\Models\Mail;
use App\Models\Role;
use App\Models\User;
use App\Utils\Constants\RoleInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('slug', str_replace("bc_role_", "",RoleInterface::BARCEL_ROLE_DEVELOPER))->first();

        $user = new User();
        $user->role_id = $role->id;
        $user->name = "Developer";
        $user->username = "developer";
        $user->email = "developer@barcelcargo.pt";
        $user->password = Hash::make("developer@2021");
        $user->birthday = date("y-m-d");
        $user->api_token = uniqid();
        $user->ip_address = "127.0.0.1";
        $user->save();

        $mail = new Mail();
        $mail->from = "noreply@barcelcargo.pt";
        $mail->to = "developer@barcelcargo.pt";
        $mail->subject = "BarcelCargo # Ativação de conta";
        $mail->body_text = "A instalação do backoffice foi feita com sucesso";
        $mail->body_html = "<h1>A instalação do backoffice foi feita com sucesso</h1>";
        $mail->save();

        $role = Role::where('slug', str_replace("bc_role_", "",RoleInterface::BARCEL_ROLE_FOUNDER))->first();

        $user = new User();
        $user->role_id = $role->id;
        $user->name = "Administrator";
        $user->username = "admin";
        $user->email = "administrator@barcelcargo.pt";
        $user->password = Hash::make("admin@2021");
        $user->birthday = date("y-m-d");
        $user->api_token = uniqid();
        $user->ip_address = "192.168.1.72";
        $user->save();

        $mail = new Mail();
        $mail->from = "noreply@barcelcargo.pt";
        $mail->to = "administrator@barcelcargo.pt";
        $mail->subject = "BarcelCargo # Ativação de conta";
        $mail->body_text = "A instalação do backoffice foi feita com sucesso";
        $mail->body_html = "<h1>A instalação do backoffice foi feita com sucesso</h1>";
        $mail->save();
    }
}
