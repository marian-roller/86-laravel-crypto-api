<?php

namespace App\Http\Controllers;

class KeyController extends Controller {

    public function generatePrivateKey() {
        return response()->json(['result' => 'public key from controller']);
    }
}