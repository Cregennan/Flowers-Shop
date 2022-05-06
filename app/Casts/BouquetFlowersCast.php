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
        $objects = array_map(function ($id, $number){
            return [Flower::find($id), $number];
        }, array_keys($ids), array_values($ids));

        var_dump($objects);
        return $objects;
    }

    /**
     * @inheritDoc
     */
    public function set($model, string $key, $value, array $attributes)
    {
        $ids = array_map(function(Flower $flower, int $number){
            return [$flower->id, $number];
        }, array_keys($value), array_values($value));
        return json_encode($ids);
    }
}
