<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\AfterSlider;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        //show brands on top menu
        $brands = Brand::select('id','brand_name','top_brand','status')->where('status','active')->where('top_brand','active')->get();
        //slider section
        $sliders = Slider::select('id','title','sub_title','image','url')->where('status','active')->get();
        //afterslider
        $aftersliders = AfterSlider::where('status','active')->get();
        //categories
        $categories = Category::with('sub_categories')->select('id','name','icon')->orderBy('id','desc')->get();
        //return $categories;
        return view('website.index',compact('brands','sliders','aftersliders','categories'));
    }
}
