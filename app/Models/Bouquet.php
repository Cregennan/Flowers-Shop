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
        'flowers' => BouquetFlowersCast::class,
    ];
}
