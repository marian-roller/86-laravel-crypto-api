<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class KeyController extends Controller {


    public function generateKeys() {
        $pair = openssl_pkey_new([
            "digest_alg"=>'sha256',
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ]);
        openssl_pkey_export($pair, $privKey);

        $public_key = openssl_pkey_get_details($pair)['key'];
        return response()->json(['result' => [
            'private_key' => $privKey, 
            'public_key' => $public_key
        ]]);
    }

    public function signMessage(Request $request) {
        $signature = 'signed message from backend';

        return response()->json(['result' => [
            'signature' => $signature, 
        ]]);

    }
}