<?php

namespace App\Service;

class EncryptService implements EncryptServiceInterface {
    
    /**
     * encrypt
     *
     * @param  array $data
     * @return string
     */
    public function encrypt(array $data): string {

        // make cipher name from request params.
        $cipher = 'aes-' . $data['keysize'] . '-' . $data['mode'];

        // check if given cipher is available
        if (!in_array($cipher, $this->getAvailableAlgos())) {
            return 'algorithm not available';
        }

        // get ivlen for given cipher
        $ivlen = openssl_cipher_iv_length($cipher);

        // make iv of given ivlen
        $iv = openssl_random_pseudo_bytes($ivlen);

        // encrypt the data
        $result_raw = openssl_encrypt(
            $data['message'], 
            $cipher, 
            $data['key'], 
            $options=OPENSSL_RAW_DATA, 
            $iv);

        // encode encrypted data
        if ($data['format'] === 'base64') {
            $result = base64_encode($iv.$result_raw);
        }

        if ($data['format'] === 'hex') {
            $result = bin2hex($iv.$result_raw);
        }
        
        return $result;
    }
    
    /**
     * getAvailableAlgos
     *
     * @return array
     */
    private function getAvailableAlgos() {
        return openssl_get_cipher_methods();
    }

}