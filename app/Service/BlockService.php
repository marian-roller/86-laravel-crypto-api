<?php

namespace App\Service;

class BlockService implements BlockServiceInterface {

    public function mine(array $data): array {

        $nonce = $data['nonce'];
        $hash = $data['hash'];
       
        while (substr($hash, 0, strlen($data['hashStart'])) !== $data['hashStart']) {
            $nonce += 1;
            $hash = $this->convert(
                $data['blockId'] . $nonce . $data['data'], 
                $data['algorithm']);
        }

        return ['nonce' => $nonce, 'hash' => $hash];
    }

    private function convert($data, $algo) {
        return hash($algo, $data);
    }
}