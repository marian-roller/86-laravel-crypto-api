<?php

namespace App\Service;

interface EncryptServiceInterface {
    public function encrypt(array $data): string;
}