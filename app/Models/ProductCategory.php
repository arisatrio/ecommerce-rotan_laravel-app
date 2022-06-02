<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductCategory extends Model
{
    use softDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'photo',
        'is_parent',
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

        static::updating(function ($model) {
            if($model->is_parent == 1) {
                $model->parent_id = NULL;
            };

            $checkIfHaveChild = static::where('parent_id', $model->id)->count();
            if($checkIfHaveChild > 0) {
                $model->is_parent = 1;
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeParentCategory($query, $type)
    {
        return $query->where('id', '!=', $type)->where('parent_id', '!=', $type);
    }

    
    public function parent()
    {
        return $this->hasOne('App\Models\ProductCategory', 'id', 'parent_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
