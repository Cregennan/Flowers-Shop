<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_custom',
        'bouquet',
        'custom_data',
        'client_name',
        'client_phone',
        'status',
    ];

    public function getPrice(){
        if($this->is_custom){
            $price = 0;
            foreach ($this->getFlowers() as $flowerdata){
                $price += $flowerdata->flower->price * $flowerdata->number;
            }
            return $price;
        }else{
            return Bouquet::find($this->bouquet)->price;
        }
    }

    public function getFlowers(){
        if(!$this->is_custom){
            return [];
        }
        return array_map(function ($id, $number){
            $t = new \stdClass();
            $t->flower = Flower::find($id);
            $t->number = $number;
            return $t;
        }, array_keys($this->custom_data), array_values($this->custom_data));
    }

    protected $casts = [
        'custom_data' => 'array'
    ];
}
