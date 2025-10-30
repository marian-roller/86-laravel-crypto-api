<?php

namespace Tests\Unit\Rules;

use App\Rules\ValidHashAlgorithm;
use PHPUnit\Framework\TestCase;

class ValidHashAlgorithmTest extends TestCase
{
    public function testAcceptsValidHashAlgorithm()
    {
        $rule                  = new ValidHashAlgorithm();
        $randomHashAlgo        = hash_algos()[array_rand(hash_algos())];
        $randomPassworHashAlgo = password_algos()[array_rand(password_algos())];
        $this->assertTrue($rule->passes('algorithm', $randomHashAlgo));
        $this->assertTrue($rule->passes('algorithm', $randomPassworHashAlgo));
    }

    public function testRejectsInvalidAlgorithm()
    {
        $rule = new ValidHashAlgorithm();
        $this->assertFalse($rule->passes('algorithm', 'sha1500'));
        $this->assertFalse($rule->passes('algorithm', 'y5'));
        $this->assertFalse($rule->passes('algorithm', ''));
    }

    public function testReturnsCorrectErrorMessage()
    {
        $rule = new ValidHashAlgorithm();
        $this->assertEquals('This is not valid algorithm.', $rule->message());
    }
}
