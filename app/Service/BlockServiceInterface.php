<?php

namespace App\Service;

use App\Data\BlockMineDataDto;

interface BlockServiceInterface {
    public function mine(BlockMineDataDto $data): array;
}