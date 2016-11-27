<?php
    $secret_key = "UAAseguridad2016IngSistemasCom9A";
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
    function encrypt($plainText){
        $encrypted_string = base4_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret_key, $string, MCRYPT_MODE_CBC, $iv));
        return $encrypted_string;
    }
    function decrypt($cipherText){
        $data=base64_decode($cipherText);
        $decrypted_string=mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secret_key, $encrypted_string, MCRYPT_MODE_CBC, $iv);
        return $decrypted_string;
    }
?>