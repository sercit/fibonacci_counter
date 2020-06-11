<?php

namespace Tests\Unit;

use App\Http\Services\MathService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MathServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFibonacci()
    {
        $mathService = new MathService();
        $this->assertEquals($mathService->fibonacci(5),5);
    }

    public function testGetFibonacci()
    {
        $mathService = new MathService();
        $this->assertEquals($mathService->getFibonacci(5),5);
    }

    public function testGetFibonacciSegment()
    {
        $mathService = new MathService();
        $this->assertEquals($mathService->getFibonacciSegment(100,600),[144,233,377]);
    }
}
