<?php

namespace Tests\Unit\Services;

use App\Data\HashConvertDataDto;
use App\Service\HashService;
use PHPUnit\Framework\TestCase;

class HashServiceTest extends TestCase
{

    public function testConvertReturnsCorrectHash(): void
    {
        $service          = new HashService();
        $randomAlgo       = hash_algos()[array_rand(hash_algos())];
        $data             = new HashConvertDataDto('test input', $randomAlgo, 'some salt');
        $result           = $service->convert($data);
        $recomputedResult = hash($data->algorithm, $data->input . $data->salt);

        $this->assertEquals($result, $recomputedResult);
    }

    public function testConvertReturnsVerifiablePasswordHash(): void
    {
        $service    = new HashService();
        $randomAlgo = password_algos()[array_rand(password_algos())];
        $data       = new HashConvertDataDto('test input', $randomAlgo, null);
        $result     = $service->convert($data);

        $this->assertTrue(password_verify($data->input, $result));
        $this->assertNotEmpty($result);
    }
}
