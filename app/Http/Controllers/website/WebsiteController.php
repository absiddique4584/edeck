<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\AfterSlider;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Slider;
use App\Models\ProductReview;
use Session;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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




    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($slug){
        return view('website.category',compact('slug'));

    }






    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadMoreCatProduct(Request $request){

        $id       = SubCategory::where('slug', $request->slug)->pluck('id');
        if ($request->ajax()) {
            if ($request->id) {
                $products = Product::where('subcat_id', $id)->where('id', '<', $request->id)->orderBy('id', 'DESC')->limit(8)->get();
            } else {
                $products = Product::where('subcat_id', $id)->orderBy('id', 'DESC')->limit(8)->get();
            }
        }

        return view('website.get-category-product',compact('products'));
    }






    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product($slug){
        $id = Product::where('slug',$slug)->pluck('id');

        if($id->isEmpty()){
            abort('404');
        }else{
            $product =  Product::where('id',$id)
                ->where('status',Product::ACTIVE_PRODUCT)
                ->first();
            $products =  Product::where('id',$id)
                ->where('status',Product::ACTIVE_PRODUCT)
                ->first();
            //return $products;
            $relatedProducts =  Product::where('id' , '!=' , $product->id)
                ->where('subcat_id',$product->subcat_id)
                ->where('status',Product::ACTIVE_PRODUCT)
                ->orderBy('id','DESC')
                ->limit(10)
                ->get();
            $newProducts =  Product::where('status',Product::ACTIVE_PRODUCT)
                ->orderBy('id','DESC')
                ->limit(12)
                ->get();
            $specialProducts =  Product::where('status',Product::ACTIVE_PRODUCT)
                ->orderBy('id','ASC')
                ->limit(12)
                ->get();
            return view('website.product',compact('product','relatedProducts','newProducts','products','specialProducts'));

        }

    }






    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewCreate(Request $request){
        //return $request;

        $request->validate([
            "product" => "required",
            "rating" => "required",
            "message" => "required",

        ]);
        ProductReview::create([
            "customer_id" => Session::get("customerId"),
            "product_id" => $request->product,
            "rating" => $request->rating,
            "message" => $request->message,

        ]);
        setMessage('success', 'Your Review Has Been Successfully Send.');
//
        return redirect()->back();
    }


}
