<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\HashServiceInterface;

class HashController extends Controller
{
    private $hashService;

    public function __construct(HashServiceInterface $hashService)
    {
        $this->hashService = $hashService;
    }

    public function algos() {
        $algos = $this->hashService->getAlgosList();
        return response()->json(['result' => $algos]);
    }

    public function passwordAlgos() {
        $algos = $this->hashService->getPasswordAlgosList();
        return response()->json(['result' => $algos]);
    }

    public function cryptAlgos() {
        // later verify if needed.
        $algos = $this->hashService->getCryptAlgos();
        return response()->json(['result' => $algos]);
    }
    
    public function convert(Request $request) {
        $result = $this->hashService->convert($request->all());
        return response()->json(['result' => $result]);
    }
}
