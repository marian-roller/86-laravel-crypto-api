<?php

namespace Tests\Unit\Services;

use App\Data\BlockMineDataDto;
use App\Service\BlockService;
use PHPUnit\Framework\TestCase;

class BlockServiceTest extends TestCase
{
    public function testMineReturnsCorrectNonceAndHash()
    {
        // ----------------------
        // ARRANGE: 
        // ----------------------
        $service = new BlockService();
        $data = new BlockMineDataDto('block123', 'test-data', '5555', '00', 'sha256', 0);
        
        // ----------------------
        // ACT:
        // ----------------------
        $result = $service->mine($data);

        // ----------------------
        // ASSERT:
        // ----------------------
        // hash starts with hashStart?
        $this->assertStringStartsWith($data->hashStart, $result['hash']);

        // output nonce is integer and gt input nonce
        $this->assertIsInt($result['nonce']);
        $this->assertGreaterThanOrEqual($data->nonce, $result['nonce']);

        // recomputed hash with final nonce is same as returned hash
        $recomputedHash = hash(
            $data->algorithm, 
            $data->blockId . $result['nonce'] . $data->data
        );
        $this->assertEquals($recomputedHash, $result['hash']);
    }
}
