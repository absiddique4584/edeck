<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'cat_id',
        'subcat_id',
        'brand_id',
        'name',
        'slug',
        'model',
        'buying_price',
        'selling_price',
        'special_price',
        'special_start',
        'special_end',
        'quantity',
        'video_url',
        'warranty',
        'warranty_duration',
        'warranty_condition',
        'thumbnail',
        'gallery',
        'description',
        'long_description',
        'hot_deals',
        'f_products',
        'status',
    ];
    public const ACTIVE_PRODUCT = 'active';
    public const INACTIVE_PRODUCT = 'inactive';
    public const VISIBLE_REVIEW = 'visible';




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brands(){
        return $this->belongsTo(Brand::class);
    }




    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(ProductReview::class)->where('status',self::VISIBLE_REVIEW);
    }





    /**
     * @return false|float|int
     */
    public function getRating()
    {
        $star = $this->reviews()->sum("rating");
        if ($star == 0) return 0;
        $avg = $star / $this->reviews()->count();

        return round($avg, 2);
    }

}

