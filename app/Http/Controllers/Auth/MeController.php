<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MeController extends Controller
{
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    /**
     * __invoke
     *
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function __invoke(Request $request) {
        $user = $request->user();

        return response()->json([
            'email' => $user->email,
            'name' => $user->name
        ]);
    }
}
