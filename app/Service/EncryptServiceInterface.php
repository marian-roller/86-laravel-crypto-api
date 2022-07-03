<?php

namespace App\Service;

interface EncryptServiceInterface {

    /**
     * encrypt
     *
     * @param  array $data
     * @return string
     */
    public function encrypt(array $data): string;
}