<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\EncryptServiceInterface;
use \Illuminate\Http\JsonResponse;

class EncryptController extends Controller
{
    private $encryptService;
    
    /**
     * __construct
     *
     * @param  EncryptServiceInterface $encryptService
     * @return void
     */
    public function __construct(EncryptServiceInterface $encryptService)
    {
        $this->encryptService = $encryptService;
    }
    
    /**
     * encrypt
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function encrypt(Request $request): JsonResponse
    {        
        $result = $this->encryptService->encrypt($request->all());
        return response()->json(['result' => $result]);
    }
}
