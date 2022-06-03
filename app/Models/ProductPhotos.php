<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhotos extends Model
{
    protected $fillable = [
        'product_id',
        'photo',
        'is_primary',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function scopePrimary($query)
    {
        return $query->where('is_primary', true)->latest();
    }
}
