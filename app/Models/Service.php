<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'type',
    ];
    const TYPE = [
        'FOR_RENT' => 'for_rent',
        'MAINTENANCE' => 'maintenance',
    ];
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            $post->slug = Str::slug($post->name);
        });
    }
    public function House()
    {
        return $this->hasMany(House::class);
    }
}
