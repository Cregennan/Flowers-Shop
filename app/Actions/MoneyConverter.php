<?php

namespace App\Actions;

class MoneyConverter
{
    public static function Convert(int $data): string {
        $tens = ($data % 100) / 10;
        $ones = $data %  10;

        if($tens == 1){
            return 'рублей';
        }else{
            return match ($ones) {
                1 => 'рубль',
                2, 3, 4 => 'рубля',
                default => 'рублей',
            };
        }
    }
}
