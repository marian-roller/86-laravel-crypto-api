<?php

namespace App\Service;

interface DecryptServiceInterface {

    /**
     * decrypt
     *
     * @param  array $data
     * @return string
     */
    public function decrypt(array $data): string;

}