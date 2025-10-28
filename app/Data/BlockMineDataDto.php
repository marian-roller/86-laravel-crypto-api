<?php

namespace App\Data;

class BlockMineDataDto
{
    public function __construct(
        public readonly string $blockId,
        public readonly string $data,
        public readonly string $hash,
        public readonly string $hashStart,
        public readonly string $algorithm,
        public int $nonce
    ) {}
}
