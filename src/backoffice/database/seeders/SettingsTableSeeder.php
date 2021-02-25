<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Utils\Constants\TypeInterface;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $setting = new Setting();
        $setting->name = TypeInterface::Types_Setting_TruckersMP_Server;
        $setting->default = "https://api.truckersmp.com/v2/servers";
        $setting->save();

        $setting = new Setting();
        $setting->name = TypeInterface::Types_Setting_TruckersMP_Events;
        $setting->default = "https://api.truckersmp.com/v2/events";
        $setting->save();

        $setting = new Setting();
        $setting->name = TypeInterface::Types_Setting_TruckersMP_VTC_Events;
        $setting->default = "https://api.truckersmp.com/v2/vtc/{id}/events";
        $setting->save();
    }
}
