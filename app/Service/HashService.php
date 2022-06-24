<?php

namespace App\Service;

class HashService implements HashServiceInterface {
       
        
    /**
     * convert
     *
     * @param  mixed $data
     * @return string
     */
    public function convert(array $data): string {

        if ($data['algorithm'] === 'md5') {
            return $this->hashMd5($data['input'], $data['salt'] = '');
            
        } 

        $result = 'not hashed';
        return $result;
    }

    
    private function hashMd5($input, $salt) {
        return md5($input . $salt);
    }

}