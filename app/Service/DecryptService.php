<?php

namespace App\Service;

class DecryptService implements DecryptServiceInterface {

    public function decrypt(array $data) {

        $result = 'unsuccesful decryption';
        $cipher = 'aes-' . $data['keysize'] . '-' . $data['mode'];
        
        $decoded_encrypted_data = base64_decode($data['message']);

        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($decoded_encrypted_data, 0, $ivlen);
        $decoded_encrypted_message = substr($decoded_encrypted_data, $ivlen);

        $decoded_decrypted_message = openssl_decrypt(
            $decoded_encrypted_message, 
            $cipher, 
            $data['key'], 
            $options=OPENSSL_RAW_DATA, 
            $iv);

        return $decoded_decrypted_message;
    }

    

}