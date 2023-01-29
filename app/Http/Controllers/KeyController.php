<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class KeyController extends Controller {


    public function generateKeys() {
        $pair = openssl_pkey_new();
        openssl_pkey_export($pair, $privKey);

        $public_key = openssl_pkey_get_details($pair)['key'];
        return response()->json(['result' => [
            'private_key' => $privKey, 
            'public_key' => $public_key
            ]]);
    }
}