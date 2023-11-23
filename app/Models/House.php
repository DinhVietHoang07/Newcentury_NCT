<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_name',
        'address',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'area',
        'rent_price',
        'sale_price',
        'status',
        'images', // Thêm trường images
    ];
}
// public function getImagesUrlAttribute()
// {
//     return asset('storage/' . $this->images);
// }

