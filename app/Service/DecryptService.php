<?php

namespace App\Service;

class DecryptService implements DecryptServiceInterface {

    const DECRYPTION_FAILED = 'Decryption failed :(';
    
    /**
     * decrypt
     *
     * @param  array $data
     * @return string
     */
    public function decrypt(array $data): string {

        $result = self::DECRYPTION_FAILED;

        // make cipher name from request params.
        $cipher = 'aes-' . $data['keysize'] . '-' . $data['mode'];

        // decode data
        $decoded_encrypted_data = base64_decode($data['message']);

        // get ivlen for give cipher
        $ivlen = openssl_cipher_iv_length($cipher);

        // get iv from data
        $iv = substr($decoded_encrypted_data, 0, $ivlen);

        // get encrypted message form data
        $decoded_encrypted_message = substr($decoded_encrypted_data, $ivlen);

        // decrypt message
        $decoded_decrypted_message = openssl_decrypt(
            $decoded_encrypted_message, 
            $cipher, 
            $data['key'], 
            $options=OPENSSL_RAW_DATA, 
            $iv);

        $result = $decoded_decrypted_message ? $decoded_decrypted_message : $result;
            
        return $result;
    }
}