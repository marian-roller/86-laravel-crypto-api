<?php

namespace App\Service;

class BlockService implements BlockServiceInterface {

    public function mine(array $data): array {

    
        $algo = $data['algorithm'];
        $blockId = $data['blockId'];
        $nonce = $data['nonce'];
        $input = $data['data'];
        
        $hash = $data['hash'];
        $condition = $data['hashStart'];

        // return [$condition];


        while (substr($hash, 0, strlen($condition)) !== $condition) {
            $nonce += 1;
            $hash = $this->convert($blockId . $nonce . $input, $algo);
        }

        return ['nonce' => $nonce, 'hash' => $hash];
    }

    private function convert($data, $algo) {
        return hash($algo, $data);
    }
}