<?php

namespace App\Service;

class BlockService implements BlockServiceInterface {

    public function mine(array $data): array 
    {
        $nonce = $data['nonce'];
        $hash = $data['hash'];

        while (substr($hash, 0, strlen($data['hashStart'])) !== $data['hashStart']) {
            $nonce += 1;
            $hash = hash($data['algorithm'], $data['blockId'] . $nonce . $data['data']);
        }

        return ['nonce' => $nonce, 'hash' => $hash];
    }

    
}