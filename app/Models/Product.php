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




    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brands(){
        return $this->belongsTo(Brand::class);
    }


}

