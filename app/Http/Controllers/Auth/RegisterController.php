<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(Request $request) {

        $object = $request->all();

        return response()->json([
            'my_data' => $object
        ]);

        // dd($object);

    }
}
