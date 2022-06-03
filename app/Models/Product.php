<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use softDeletes;

    protected $fillable = [
        'name',
        'product_category_id',
        'slug',
        'summary',
        'description',
        'stock',
        'price',
        'discount',
        'dimension',
        'is_featured',
        'status',
        'user_id',
    ];

    protected $appends = ['discountPrice'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug   = Str::slug($model->name);
            $count  = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            $model->slug = $count ? "{$slug}-{$count}" : $slug;
        });
    }

    public function getPriceAttribute($value)
    {
        return 'Rp. '.number_format($value);
    }

    public function getDiscountPriceAttribute($value)
    {
        $disc = ((float)$this->attributes['price'] * (float)$this->attributes['discount'])/100;
        $discountPrice = (float)$this->attributes['price'] - $disc;
        
        return 'Rp. '.$discountPrice;
    }

    public function getDiscountAttribute($value)
    {
        if ($value != NULL) {
            return $value.'%';
        } else {
            return '-%';
        }
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function productPhotos()
    {
        return $this->hasMany(ProductPhotos::class);
    }

    public function productPhotosPrimary()
    {
        return $this->hasOne(ProductPhotos::class)->where('is_primary', 1)->latest();
    }
    
}
