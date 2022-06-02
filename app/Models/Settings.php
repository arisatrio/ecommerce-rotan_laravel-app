<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table    = 'web_settings';
    protected $fillable = [
        'short_des',
        'description',
        'photo',
        'address',
        'phone',
        'email',
        'logo',
        'user_id'
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
