<?php

namespace App\Http\Controllers;

use App\Data\HashConvertDataDto;
use App\Http\Requests\HashConvertRequest;
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

    public function convert(HashConvertRequest $request) {
        $dto = new HashConvertDataDto(...$request->validated());
        $result = $this->hashService->convert($dto);
        return response()->json(['result' => $result]);
    }
}
