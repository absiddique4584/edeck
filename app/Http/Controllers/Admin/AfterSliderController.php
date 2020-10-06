<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AfterSlider;
use Exception;
class AfterSliderController extends Controller
{
    public function index()
    {
        $aftersliders = AfterSlider::latest()->get();
        return view('admin.afterslider.manage', compact('aftersliders'));
    }




    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.afterslider.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'money_back'     => 'required',
            'free_shipping' => 'required',
            'first_time'     => 'required',
            'status'     => 'required',

        ]);
        $afterslider = null;
        try {

            $afterslider = AfterSlider::create([
                'money_back'     => $request->money_back,
                'free_shipping' => $request->free_shipping,
                'first_time'       => $request->first_time,
                'status'       => $request->status,
            ]);
        } catch (Exception $exception) {
            $afterslider = false;
        }

        if ($afterslider) {
            setMessage('success', 'Yay! A Afterslider has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Afterslider.');
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
        $afterslider = AfterSlider::find($id);
        return view('admin.afterslider.edit', compact('afterslider'));
    }



    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $afterslider = AfterSlider::find($id);

        $request->validate([
            'money_back'     => 'required',
            'free_shipping' => 'required',
            'first_time'     => 'required',
        ]);

        $success = null;
        try {
            $success = $afterslider->update([
                'money_back'     => $request->money_back,
                'free_shipping' => $request->free_shipping,
                'first_time'       => $request->first_time,
                'status'       => 'active',
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Afterslider has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Afterslider.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $afterslider         = AfterSlider::find($id);
        $afterslider->status = $status;
        $afterslider->save();
    }




    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $id     = base64_decode($id);
            $afterslider = AfterSlider::find($id);
            $afterslider->delete();
            setMessage('success', 'Yay! a AfterSlider has been successfully deleted!');
        }catch (Exception $exception){
            setMessage('warning', 'Oops! Unable to delete a AfterSlider.');
        }

        return redirect()->back();
    }
}
