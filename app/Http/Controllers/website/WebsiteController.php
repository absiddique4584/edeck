<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        //show brands on top menu
        $brands = Brand::select('id','brand_name','top_brand','status')->where('status','active')->where('top_brand','active')->get();
        return view('website.index',compact('brands'));
    }
}
