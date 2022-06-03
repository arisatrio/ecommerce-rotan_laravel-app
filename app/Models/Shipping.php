<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use softDeletes;

    protected $fillable = [
        'type',
        'destination',
        'price',
        'status',
        'user_id'
    ];

    public function getPriceAttribute($value)
    {
        return 'Rp. '.number_format($value);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
