<?php

namespace App\Service;

interface HashServiceInterface {
    public function convert(array $data): string;
}