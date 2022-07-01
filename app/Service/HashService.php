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

        // for hash()
        foreach (hash_algos() as $algo) {
            // $algosList[] = $algo;
        }
        return $algosList;
    }

    /**
     * getPasswordAlgosList
     *
     * @return array
     */
    public function getPasswordAlgosList(): array {
        $algosList = [];
        // algos for hash_password() -> depending on server php version
        foreach (password_algos() as $algo) {
            $algosList[] = $algo;
        }
        return $algosList;
    }

    /**
     * getCryptAlgos
     *
     * @return array
     */
    public function getCryptAlgos(): array {
        $constants = get_defined_constants();
        $algos = [];

        foreach ($constants as $constant => $value) {
            if (substr($constant, 0, 6) == 'CRYPT_') {
                $algos[] = $constant;
            }
        }
        
        // removing constant CRYPT_SALT_LENGTH from algos list
        if (in_array('CRYPT_SALT_LENGTH', $algos)) {   
            $saltConstantIndex = array_search('CRYPT_SALT_LENGTH', $algos);
            array_splice($algos, $saltConstantIndex, 1);
        }

        return $algos;
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