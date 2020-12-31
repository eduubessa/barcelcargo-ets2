<?php

namespace App\Utils\Scripts;


class SymmetricCryptography
{

    private static $_key = "ss1223xsdl)ppO00+";
    private static $_cipher = "aes-128-gcm";

    /**
     * @param string $data|\stdClass $data
     * @return string
     */
    public function encrypt($data){

        if($data === ""){

            return "";
        }

        if(!is_string($data)){

            $data = json_encode($data);
        }

        $data = utf8_encode($data);

        $ivlen = openssl_cipher_iv_length(self::$_cipher);

        $iv = openssl_random_pseudo_bytes($ivlen);

        $ciphertext = openssl_encrypt($data, self::$_cipher, self::$_key, $options=0, $iv, $tag);

        if(!$ciphertext){

            //TODO:Set up this type of internal errors
            return "FAILED";
        }

        $result = [];
        $result["iv"] = bin2hex($iv);
        $result["tag"] = bin2hex($tag);
        $result["data"] = bin2hex($ciphertext);

        //dd($result);

        if(!($encryptedData = json_encode($result))){

            //TODO:Set up this type of internal errors
            return "FAILED1";
        }

        if(!($encryptedData = base64_encode($encryptedData))){

            //TODO:Set up this type of internal errors
            return "FAILED2";
        }

        return $encryptedData;
    }

    /**
     * @param string $encryptedData
     * @return string
     */
    public function decrypt($encryptedData){

        if($encryptedData === ""){

            return "";
        }

        if(!($uncompressed = base64_decode($encryptedData))){

            //TODO:Set up this type of internal errors
            return "UNREADABLE1";
        }

        if(!($uncompressed = json_decode($uncompressed))){

            //TODO:Set up this type of internal errors
            return "UNREADABLE2";
        }

        if(!isset($uncompressed->iv) || !isset($uncompressed->tag) || !isset($uncompressed->data)){

            //TODO:Set up this type of internal errors
            return "UNREADABLE";
        }

        $original_plaintext = openssl_decrypt(hex2bin($uncompressed->data), self::$_cipher, self::$_key, $options=0, hex2bin($uncompressed->iv), hex2bin($uncompressed->tag));

        if(!$original_plaintext){

            //TODO:Set up this type of internal errors
            return "UNREADABLE";
        }

        return utf8_decode($original_plaintext);
    }
}
