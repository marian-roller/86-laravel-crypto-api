<?php

namespace App\Service;

class EncryptService implements EncryptServiceInterface {

    public function encrypt(array $data): string {
        $result = 'from service';
        return $result;
    }

}