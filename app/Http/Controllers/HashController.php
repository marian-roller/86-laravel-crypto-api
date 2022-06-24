<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HashController extends Controller
{
    public function convert(Request $request) {

        $data = $request->all();

        // dd($data);

        $hash = md5($data['input']);

        return response()->json([
            'result' => $hash
        ]);
    }
}
