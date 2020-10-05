<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\ImageManagerStatic as Image;
use Exception;
class SliderController extends Controller
{


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.manage', compact('sliders'));
    }




    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.slider.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'sub_title' => 'required',
            'image'     => 'required',
            'url'       => 'required',
        ]);
        $slider = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            Image::make($image)
                ->resize(500,250)
                ->save(public_path('uploads/slider/').$fileName);
            //$image->move(public_path('uploads/slider/'), $fileName);

            $slider = Slider::create([
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'image'     => $fileName,
                'url'       => $request->url,
            ]);
        } catch (Exception $exception) {
            $slider = false;
        }

        if ($slider) {
            setMessage('success', 'Yay! A slider has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new slider.');
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id       = base64_decode($id);
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }



    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);

        $request->validate([
            'title'     => 'required',
            'sub_title' => 'required',
            'image'     => 'required',
            'url'       => 'required',
        ]);

        $success = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            Image::make($image)
                ->resize(500,250)
                ->save(public_path('uploads/slider/').$fileName);
            //$image->move(public_path('uploads/slider/'), $fileName);

            $success = $slider->update([
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'image'     => $fileName,
                'url'       => $request->url,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A slider has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update slider.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $slider         = Slider::find($id);
        $slider->status = $status;
        $slider->save();
    }




    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $id     = base64_decode($id);
            $slider = Slider::find($id);
            unlink(public_path('uploads/slider/') . $slider->image);
            $slider->delete();
            setMessage('success', 'Yay! a Slider has been successfully deleted!');
        }catch (Exception $exception){
            setMessage('warning', 'Oops! Unable to delete a slider.');
        }

        return redirect()->back();
    }
}
