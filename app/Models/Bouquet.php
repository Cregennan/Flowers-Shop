<?php

namespace App\Models;

use App\Casts\BouquetFlowersCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouquet extends Model
{
    use HasFactory;

    protected $fillable = [
        'flowers',
        'name',
        'picture',
        'description',
        'picture'
        ];

    protected $casts = [
        'flowers' => 'array'
    ];

    public function getFlowers(){
        return array_map(function ($id, $number){
            $t = new \stdClass();
            $t->flower = Flower::find($id);
            $t->number = $number;
            return $t;
        }, array_keys($this->flowers), array_values($this->flowers));
    }

}
