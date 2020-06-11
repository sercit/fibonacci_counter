<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Redis;

class MathService{

    const FIBONACCI_CACHE_KEY = 'MATH.FIBONACCI';

    public function getFibonacciCacheKey(){
        return self::FIBONACCI_CACHE_KEY;
    }

    public function fibonacci(int $n){
        if($n == 0){
            $value = 0;
        }else{
            $a = 1;
            $b = 1;
            for($i = 3; $i <= $n; $i++){
                $c = $a + $b;
                $a = $b;
                $b = $c;
            }
            $value = $b;
        }
        return $value;
    }


    public function getFibonacciSegment(int $from,int $to){
        $n=0;
        do{
            $fibonacci = $this->getFibonacci($n);
            if($fibonacci > $from && $fibonacci < $to){
                $result[] = $fibonacci;
            }
            $n++;
        }while($fibonacci < $to);
        return $result;
    }

    public function getFibonacci($n){
        $cacheKey = $this->getFibonacciCacheKey().':'.$n;
        $cachedValue = Redis::get($cacheKey);
        if($cachedValue){
            $value = intval($cachedValue);
        }else{
            $value = $this->fibonacci($n);
            Redis::set($cacheKey, $value);
        }
        return $value;
    }
}
