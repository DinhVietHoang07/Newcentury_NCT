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
        'area_bedrooms',
        'area',
        'rent_price',
        'content',
        'service_id',
        'images', // Thêm trường images
        'viewer',
        'option',
        'convenient'
    ];
    public function Service()
    {
        return $this->belongsTo(Service::class);
    }
}
// public function getImagesUrlAttribute()
// {
//     return asset('storage/' . $this->images);
// }

