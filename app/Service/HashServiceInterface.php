<?php

namespace App\Service;

use App\Data\HashConvertDataDto;

interface HashServiceInterface {
    public function convert(HashConvertDataDto $data): string;
    public function getAlgosList(): array;
    public function getPasswordAlgosList(): array;
}