<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart;
class CartController extends Controller
{




    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $product = Product::select('name', 'slug', 'selling_price', 'special_price', 'special_start', 'special_end', 'thumbnail')->find($request->id);

        $price = false;
        if ($product->special_start <= date('Y-m-d') && $product->special_end >= date('Y-m-d')) {
            $price = true;
        }

        \Cart::add([
            'id'         => $request->id,
            'name'       => $product->name,
            'price'      => $price ? $product->special_price : $product->selling_price,
            'quantity'   => 1,
            'attributes' => [
             'slug'      => $product->slug,
            'thumbnail' => $product->thumbnail
            ],
        ]);

        return redirect('cart/show');
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(){
        return view('cart.show');
    }




    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->back();
    }




    public function update(Request $request){
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->back();
    }
}
