<?php

namespace App\Service;

class EncryptService implements EncryptServiceInterface {

    public function encrypt(array $data): string {

        // working base modes: aes, aria(less modes), camellia (less modes)
        $cipher = 'aes-' . $data['keysize'] . '-' . $data['mode'];

        if (!in_array($cipher, $this->getAvailableAlgos())) {
            return 'algorithm not available';
        }

        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivlen);

        $result = openssl_encrypt(
            $data['message'], 
            $cipher, 
            $data['key'], 
            $options=0, 
            $iv);
        return $result;
    }

    private function getAvailableAlgos() {
        return openssl_get_cipher_methods();
    }

}