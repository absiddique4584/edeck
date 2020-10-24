<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Darryldecode\Cart\Cart;
class CheckoutController extends Controller
{
    public function index(){

        if (\Cart::getTotalQuantity() < 1){
            //abort('404');
            return redirect('/');
        }else{
            if (Session::get('customerId')){
                return redirect('checkout/shipping');
            }else{
                return view('checkout.index');
            }
        }
    }







    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required|unique:customers,email',
            'phone' => 'required|min:11|max:11',
            'password' => 'min:5|max:20|required_with:confirm_password|same:confirm_password',

        ]);

        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt( $request->password ),

        ]);
        Session::put('customerId',$customer->id);

        //$details = [
        //   'name' => $customer->name,
        // ];
        //Mail::to($customer->email)->send(new Welcome($details));


        return redirect('checkout/shipping');
    }







    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function login(Request $request){
        //return $request;

        $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $customer = Customer::where('email', $request->email)->select('id','email','password')->first();
        // return $customer;

        if ($customer){
            if ( password_verify($request->password,$customer->password)){
                Session::put('customerId',$customer->id);
                Session::put('customerEmail',$customer->email);
                return redirect('checkout/shipping');
            }else{
                setMessage('danger','These credentials Password do not match our records.');
                return redirect()->back();
            }
        }else{
            setMessage('danger','These credentials do not match our records.');
            return redirect()->back();
        }
    }









    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Session()->forget('customerId');
        return redirect()->back();
    }








    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function shipping(){

        if (!Session::get('customerId')){
            //abort('404');
            return redirect('/');
        }

        //$customer = Customer::find( Session::get('customerId'))->select('name','email','phone')->first();
        //return $customer;
        //exit();
        return view('checkout.shipping');
    }









    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function shippingInfo(Request $request){



        $request->validate([
            'name' => 'required|min:5|max:30',
            'email' => 'required',
            'phone' => 'required|min:11|max:11',
            'address' => 'required|string',

        ]);

        $shipping = Shipping::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        Session::put('shippingId',$shipping->id);

        return redirect('checkout/payment');


    }







    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function payment(){

        if (!Session::get('customerId')){
            //abort('404');
            return redirect('/');
        }

        return view('checkout.payment');
    }









    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function order(Request $request)
    {

        $order = $this->insertOrder();


        Payment::create([
            "order_id" => $order->id,
            "type" => $request->type
        ]);

        $this->insertorderInfo($order->id);


        \Cart::clear();
        return view('checkout.success');


    }






    /**
     * @return mixed
     */
    private function insertOrder(){
        $order = Order::create([
            "customer_id" => Session::get('customerId'),
            "shipping_id" => Session::get('shippingId'),
            "total" => \Cart::getTotal(),
        ]);
        return $order;
    }







    /**
     * @param $orderId
     */
    private function insertorderInfo($orderId){

        foreach (\Cart::getContent() as $item){
            OrderInfo::create([
                "order_id" => $orderId,
                "product_id" => $item->id,
                "product_name" => $item->name,
                "product_price" => $item->price,
                "product_qty" => $item->quantity,

            ]);
        }
    }
}
