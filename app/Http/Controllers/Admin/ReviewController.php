<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manage(){
        $reviews = ProductReview::with('customer','product')
            ->orderBy('id','DESC')
            ->get();
        //return $reviews;
        return view('admin.review.manage',compact('reviews'));
    }





    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function review_show($id){

        $id =base64_decode($id);
        $review_show = ProductReview::with('customer','product')
            ->orderBy('id','DESC')
            ->find($id);
        //return $review_show;
        return view('admin.review.show',compact('review_show'));
    }



    /**
     * @param $id
     * @param $status
     */
    public function update_review($id,$status){
        $review = ProductReview::find($id);
        $review->status = $status;
        $review->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id){
        $id = base64_decode($id);
        $review = ProductReview::find($id);
        $review->delete();
        setMessage('success','Review has been Successfully Deleted !');
        return redirect()->back();
    }
}
