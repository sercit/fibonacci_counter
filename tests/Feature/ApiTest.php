<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFibonacci()
    {
        $data = [
            'from' => 100,
            'to'   => 500,
        ];
        $response = $this->call('GET',route('fibonacci'), $data);
        $response->assertStatus(200)
                ->assertJson([
                    144,233,377
                ]);
    }
}
