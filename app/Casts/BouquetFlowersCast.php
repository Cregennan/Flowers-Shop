<?php

namespace App\Casts;


use App\Models\Flower;

class BouquetFlowersCast implements \Illuminate\Contracts\Database\Eloquent\CastsAttributes
{

    /**
     * @inheritDoc
     */
    public function get($model, string $key, $value, array $attributes)
    {
        /** @var array $ids */
        $ids = json_decode($value, true);
        $objects = array_map(function ($id){
            return Flower::find($id);
        },$ids);
        var_dump($objects);
        return $objects;
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes)
    {
        $ids = array_map(function(Flower $flower){
            return $flower->id;
        }, $value);
        return json_encode($ids);
    }
}
