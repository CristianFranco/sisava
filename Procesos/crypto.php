<?php
    $secret_key = "UAAseguridad2016IngSistemasCom9A";
    $iv = "ZoLF8NUWRsQiiwnvdK30+XTCcuxJk2lOm2hBJ5MI4wA=";
    function encrypt($plainText){
        global $secret_key;
        global $iv;
        $encrypted_string = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $plainText, MCRYPT_MODE_CBC, base64_decode($iv)));
        return $encrypted_string;
    }
    function decrypt($cipherText){
        global $secret_key;
        global $iv;
        $data=base64_decode($cipherText);
        $decrypted_string=rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secret_key, $data, MCRYPT_MODE_CBC, base64_decode($iv)));
        return $decrypted_string;
    }
?>