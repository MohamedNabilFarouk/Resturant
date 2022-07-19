<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use App\Traits\imagesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    use imagesTrait;

    public function index()
    {
        $sliders = Slider ::take(3) -> get();
        return view('admin.sliders.index', compact('sliders'));
    } // end of index

    public function edit($id)
    {
        $slider = Slider ::find($id);
        return view('admin.sliders.edit', compact('slider'));

    } // end of edit

    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'des_en' => 'required|string',
            'des_ar' => 'required|string',
            'image' => 'required',
        ]);

        $slider = Slider ::find($id);

        DB ::beginTransaction();

        if ($request -> has('image')) {
            if($slider -> image != 'default.png'){
                Storage ::disk('public_uploads') -> delete('sliders/' . $slider -> image);
            }

            $image = $this -> saveImages($request -> image[0], 'images/sliders');
            $data['image'] = $image;

        }
        $slider -> update($data);

        DB ::commit();

        session() -> flash('success', trans('Updated Successfully'));
        return redirect() -> route('slider.index');
    } // end of update

} // end of controller
