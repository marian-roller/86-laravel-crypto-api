<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\EncryptServiceInterface;

class EncryptController extends Controller
{
    private $encryptService;

    public function __construct(EncryptServiceInterface $encryptService)
    {
        $this->encryptService = $encryptService;
    }

    public function encrypt(Request $request) 
    {        
        $result = $this->encryptService->encrypt($request->all());
        return response()->json(['result' => $result]);
    }
}
