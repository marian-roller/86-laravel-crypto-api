<?php

namespace App\Http\Controllers;

use App\Data\BlockMineDataDto;
use App\Http\Requests\BlockMineRequest;
use Illuminate\Http\Request;
use App\Service\BlockServiceInterface;

class BlockController extends Controller
{
    private $blockService;

    public function __construct(BlockServiceInterface $blockService)
    {
        $this->blockService = $blockService;
    }

    public function mine(BlockMineRequest $request) {
        $dto = new BlockMineDataDto(...$request->validated());
        $data = $this->blockService->mine($dto);
        return response()->json(['result' => $data]);
    }
}
