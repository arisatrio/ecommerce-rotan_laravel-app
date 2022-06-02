<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Banner extends Model
{
    use softDeletes;

    protected $table    = 'web_banners';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'photo',
        'status',
        'user_id'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = Str::slug($model->name);
            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            $model->slug = $count ? "{$slug}-{$count}" : $slug;
            if($count == 0) {
                $model->user_id  = auth()->user()->id;
            }
        });
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
