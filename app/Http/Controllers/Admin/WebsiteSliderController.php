<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class WebsiteSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:website-settings']);
    }

    public function AllSlider()
    {
        $all = DB::table('website_sliders')->orderBy('id', 'DESC')->get();
        return view('admin.slider.index', compact('all'));
    }

    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    public function InsertSlider(Request $request)
    {
        $data = array();
        $data['slider_title'] = $request->slider_title;
        $slider_image = $request->file('slider_image');
        if ($slider_image) {
            $imageName = time() . '.' . $request->slider_image->extension();

            $request->slider_image->move(public_path('upload/Slider'), $imageName);
            $data['slider_image'] = 'upload/Slider/' . $imageName;

        }

        DB::table('website_sliders')->insert($data);
        $notification = array(
            'messege' => "Successfully, Slider Inserted",
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditSlider($id)
    {
        $edit = DB::table('website_sliders')->where('id', $id)->first();
        return view('admin.slider.edit', compact('edit'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        $get_data = DB::table('website_sliders')->where('id', $id)->first();
        $data = array();
        $data['slider_title'] = $request->slider_title;
        $slider_image = $request->file('slider_image');
        if ($slider_image) {
            $imageName = time() . '.' . $request->slider_image->extension();

            $request->slider_image->move(public_path('upload/Slider'), $imageName);

            $data['slider_image'] = 'upload/Slider/' . $imageName;

        } else {
            $data['slider_image'] = $get_data->slider_image;
        }

        DB::table('website_sliders')->where('id', $id)->update($data);
        $notification = array(
            'messege' => "Successfully, Slider Updated",
            'alert-type' => 'success'
        );
        return Redirect('/all-slider')->with($notification);
    }

    public function DeleteSlider($id)
    {
        $get_data = DB::table('website_sliders')->where('id', $id)->first();
        DB::table('website_sliders')->where('id', $id)->delete();


        $notification = array(
            'messege' => "Successfully, Slider Deleted",
            'alert-type' => 'success'
        );
        return Redirect('/all-slider')->with($notification);
    }
}
