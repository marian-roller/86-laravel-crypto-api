<?php

namespace App\Data;

class HashConvertDataDto
{
    public function __construct(
        public readonly string $input,
        public readonly string $algorithm,
        public readonly ?string $salt,
    ) {}
}
