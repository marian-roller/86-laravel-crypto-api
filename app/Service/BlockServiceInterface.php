<?php

namespace App\Service;

interface BlockServiceInterface {
    public function mine(array $data): array;
}