<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\DecryptServiceInterface;

class DecryptController extends Controller
{

    private $decryptService;

    public function __construct(DecryptServiceInterface $decryptService)
    {
        $this->decryptService = $decryptService;
    }

    public function decrypt(Request $request) 
    {        
        $result = $this->decryptService->decrypt($request->all());
        return response()->json(['result' => $result]);
    }
}
