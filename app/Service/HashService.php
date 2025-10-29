<?php

namespace App\Service;

use App\Data\HashConvertDataDto;

class HashService implements HashServiceInterface {
       
    /** @return string[] */
    public function getAlgosList(): array 
    {
        return hash_algos();
    }

    /** @return string[] */
    public function getPasswordAlgosList(): array 
    {
        return password_algos();
    }

    public function convert(HashConvertDataDto $data): string 
    {
        $result = 'algorithm not implemented';

        if (in_array($data->algorithm, $this->getPasswordAlgosList())) {
            $result = $this->convertPasswordHash($data);
        } else {
            $result = $this->convertHash($data);
        }

        return $result;
    }
    
    private function convertHash(HashConvertDataDto $data): string 
    {
        $salt = isset($data->salt) ? $data->salt : '';

        if (in_array($data->algorithm, $this->getAlgosList())) {
            $result = hash(
                $data->algorithm, 
                $data->input . 
                $salt
            );
        }

        return $result;
    }
    
    private function convertPasswordHash(HashConvertDataDto $data): string 
    {
        $result = password_hash(
            $data->input,
            $data->algorithm
        );
        
        return $result;
    }
}