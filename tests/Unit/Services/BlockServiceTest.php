<?php

namespace Tests\Unit\Services;

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

        $data = [
            'nonce' => 0,
            'hash' => '',          
            'hashStart' => '00',   
            'algorithm' => 'sha256',
            'blockId' => 'block123',
            'data' => 'test-data',
        ];

        // ----------------------
        // ACT:
        // ----------------------
        $result = $service->mine($data);

        // ----------------------
        // ASSERT:
        // ----------------------
        // hash starts with hashStart?
        $this->assertStringStartsWith($data['hashStart'], $result['hash']);

        // output nonce is integer and gt input nonce
        $this->assertIsInt($result['nonce']);
        $this->assertGreaterThanOrEqual($data['nonce'], $result['nonce']);

        // recomputed hash with final nonce is same as returned hash
        $recomputedHash = hash(
            $data['algorithm'], 
            $data['blockId'] . $result['nonce'] . $data['data']
        );
        $this->assertEquals($recomputedHash, $result['hash']);
    }
}
