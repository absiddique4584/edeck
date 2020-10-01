<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.manage', compact('categories'));
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }






    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:30',
        ]);
        $category = null;
        try {
            $name     = $request->name;
            $category = Category::create([
                'name' => $name,
                'slug' => slugify($name)
            ]);
        } catch (Exception $exception) {
            $category = false;
        }

        if ($category) {
            setMessage('success', 'Yay! A category has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new category.');
        }
        return redirect()->back();
    }







    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id       = base64_decode($id);
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $category = Category::find($id);

        $request->validate([
            'name' => 'required|min:5|max:20',
        ]);

        $success = null;
        try {
            $name    = $request->name;
            $success = $category->update([
                'name' => $name,
                'slug' => slugify($name),
                //'status' => 'active'
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A category has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update category.');
        }
        return redirect()->back();
    }





    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $category         = Category::find($id);
        $category->status = $status;
        $category->save();
    }






    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $category = Category::find($id);
        $category->delete();
        setMessage('success', 'Yay! Category has been successfully deleted!');
        return redirect()->back();
    }
}
