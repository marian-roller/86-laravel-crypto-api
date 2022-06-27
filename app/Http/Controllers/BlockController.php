<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\BlockServiceInterface;

class BlockController extends Controller
{

    private $blockService;

    public function __construct(BlockServiceInterface $blockService)
    {
        $this->blockService = $blockService;
    }

    public function mine(Request $request) {
        $data = $this->blockService->mine($request->all());
        return response()->json(['result' => $data]);

    }
}
