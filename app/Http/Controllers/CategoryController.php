<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{


    /**
     * @return mixed
     */
    public function index()
    {
        $categories = Category::with('posts')->get();

        return $categories;
    }



    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'status' => 'required'
        ]);

        Category::create([
            'name'   => $request->name,
            'slug'   => $request->name,
            'status' => $request->status
        ]);
    }
}
