<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    protected $fillable =['customer_id','shipping_id','total'];

    use SoftDeletes;
    public function shipping(){
        return $this->belongsTo(Shipping::class)->select('id','name','phone','email','address','shipping_charge');
    }

    public function customer(){
        return $this->belongsTo(Customer::class)->select('id','name','phone','email');
    }

    public function payment(){
        return $this->belongsTo(Payment::class,'id','order_id');
    }

    public function order_info(){
        return $this->hasMany(OrderInfo::class,'order_id','id');
    }
}
