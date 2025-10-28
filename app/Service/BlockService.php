<?php

namespace App\Service;

use App\Data\BlockMineDataDto;

class BlockService implements BlockServiceInterface {

    public function mine(BlockMineDataDto $data): array
    {
        $nonce = $data->nonce;
        $hash = $data->hash;

        while (substr($hash, 0, strlen($data->hashStart)) !== $data->hashStart) {
            $nonce++;
            $hash = hash($data->algorithm, $data->blockId . $nonce . $data->data);
        }

        return [
            'nonce' => $nonce,
            'hash' => $hash,
        ];
    }
}