<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\SubCategory;
use App\Models\Category;
class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::with('category')->latest()->get();
        return view('admin.subcategory.manage', compact('subcategories'));
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.subcategory.create', compact('categories'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name'     => 'required|min:5|max:30',
        ]);
        $category = null;
        try {
            $name     = $request->name;
            $category = SubCategory::create([
                'category_id' => $request->category,
                'name'        => $name,
                'slug'        => slugify($name)
            ]);
        } catch (Exception $exception) {
            $category = false;
        }

        if ($category) {
            setMessage('success', 'Yay! A subcategory has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new subcategory.');
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
        $subCat = SubCategory::find($id);

        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.subcategory.edit', compact('subCat', 'categories'));
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $category = SubCategory::find($id);

        $request->validate([
            'category' => 'required',
            'name'     => 'required|min:5|max:20',
        ]);

        $success = null;
        try {
            $name    = $request->name;
            $success = $category->update([
                'category_id' => $request->category,
                'name'        => $name,
                'slug'        => slugify($name)
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A sub category has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update sub category.');
        }
        return redirect()->back();
    }






    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $category         = SubCategory::find($id);
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
        $category = SubCategory::find($id);
        $category->delete();
        setMessage('success', 'Yay! Category has been successfully deleted!');
        return redirect()->back();
    }
}


