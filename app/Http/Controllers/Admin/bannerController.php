<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Banner;
use Illuminate\Http\Request;
use App\Traits\imagesTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class bannerController extends Controller
{
    use imagesTrait;

    public function index()
    {
        $banners = Banner ::take(3) -> get();
        // dd($banner);
        return view('admin.banner.index', compact('banners'));
    } // end of index

    public function edit($id)
    {
        $banner = Banner ::find($id);
      
        return view('admin.banner.edit', compact('banner'));

    } // end of edit

    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'des_en' => 'required|string',
            'des_ar' => 'required|string',
            // 'image' => 'required',
            'default'=>'required',
            'expire_at'=>'required',
        ]);

        $banner = Banner ::find($id);

        DB ::beginTransaction();

        if ($request -> has('image')) {
            if($banner -> image != 'default.png'){
                Storage ::disk('public_uploads') -> delete('banners/' . $banner -> image);
            }
            $image = $this -> saveImages($request -> image[0], 'images/banners');
            $data['image'] = $image;
        }

        if ($request -> has('default')) {
            if($banner -> default != 'default.png'){
                Storage ::disk('public_uploads') -> delete('banners/' . $banner -> default);
            }
            $default = $this -> saveImages($request -> default[0], 'images/banners');
            $data['default'] = $default;
        }
        $banner -> update($data);

        DB ::commit();

        session() -> flash('success', trans('Updated Successfully'));
        return redirect() -> route('banner.index');

    } // end of update

} // end of controller
