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
        $salt = !empty($data->salt) ? $data->salt : '';
        $input = $data->input . $salt;

        if (in_array($data->algorithm, $this->getPasswordAlgosList())) {
            $result = password_hash($input, $data->algorithm);
        } elseif (in_array($data->algorithm, $this->getAlgosList())) {
            $result = hash($data->algorithm, $input);
        }

        return $result;
    }
}