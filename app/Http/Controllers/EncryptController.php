<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptController extends Controller
{
    public function encrypt(Request $request) {
        $result = $request->all();
        $result = 'encrypted message';
        return response()->json(['result' => $result]);
    }
}
