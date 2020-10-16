<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = ['customer_id','product_id','message','rating'];



    public function customer(){
        return $this->belongsTo(Customer::class)->select('id','email','phone');
    }



    public function product(){
        return $this->belongsTo(Product::class)->select('id','name','thumbnail','selling_price');
    }


}
