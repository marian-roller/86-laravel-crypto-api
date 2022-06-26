<?php

namespace App\Service;

class HashService implements HashServiceInterface {
       
            
    /**
     * getAlgosList
     *
     * @return array
     */
    public function getAlgosList(): array {
        $algosList = [];

        foreach (hash_algos() as $algo) {
            $algosList[] = $algo;
        }

        return $algosList;
    }


    /**
     * convert
     *
     * @param  mixed $data
     * @return string
     */
    public function convert(array $data): string {

        $result = 'algorithm not implemented';

        $salt = isset($data['salt']) ? $data['salt'] : '';

        if (in_array($data['algorithm'], $this->getAlgosList())) {
            $result = hash(
                $data['algorithm'], 
                $data['input'] . 
                $salt
            );
        }

        return $result;
    }

}