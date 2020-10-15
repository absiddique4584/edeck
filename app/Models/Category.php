<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','icon','status'];

    public function sub_categories(){
        return $this->hasMany(SubCategory::class)->where('status','active');
    }

}
