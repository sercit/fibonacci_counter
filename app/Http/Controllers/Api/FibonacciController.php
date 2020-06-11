<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FibonacciIndexRequest;
use Illuminate\Support\Facades\Redis;
use App\Http\Services\MathService;
use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    public function index(FibonacciIndexRequest $request){
        return (new MathService)->getFibonacciSegment($request->input('from',0),$request->input('to'));
    }
}
