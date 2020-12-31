<?php

namespace App\Utils;

use Illuminate\Support\Facades\Cookie;

class Helper {

    /**
     * Create or set cookie
     *
     * @param $name
     * @param $value
     * @param int $time
     */
    public static function setCookie($name, $value, $time = 0)
    {
        if($time <= 0) {
            $time = 5 * (60 * 24 * 365);
        }

        Cookie::queue($name, $value, $time);
    }

    /**
     * Get cookie value by name
     *
     * @param $name
     * @return array|string|null
     */
    public static function getCookie($name)
    {
        return Cookie::get($name);
    }

}
