<?php

namespace App\Http\Controllers;

use App\Service\DecryptService;
use Illuminate\Http\Request;
use App\Service\DecryptServiceInterface;
use \Illuminate\Http\JsonResponse;

class DecryptController extends Controller
{

    private $decryptService;
    
    /**
     * __construct
     *
     * @param  DecryptServiceInterface $decryptService
     * @return void
     */
    public function __construct(DecryptServiceInterface $decryptService)
    {
        $this->decryptService = $decryptService;
    }
    
    /**
     * decrypt
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function decrypt(Request $request): JsonResponse
    {        
        $result = $this->decryptService->decrypt($request->all());
        try {
            return response()->json(['result' => $result]);
        } catch (\Exception $e) {
            return response()->json(['result' => DecryptService::DECRYPTION_FAILED]);
        }

        
    }
}
