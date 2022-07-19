<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Traits\imagesTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class categoryController extends Controller
{
    use imagesTrait;

    public function index()
    {
        $categories = Category ::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request -> validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'image' => 'required',


        ]);
        if ($request -> has('image')) {
            $image = $this -> saveImages($request -> image, 'images/categories');
            $data['image'] = $image;
        }
        $data['status'] = $request -> status;

        Category ::create($data);
        session() -> flash('success', trans('added successfully'));
        return redirect() -> route('category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category ::find($id);
        return view('admin.category.edit', compact('category'));

    }

    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            // 'image' => 'required',
        ]);

        $category = Category ::find($id);

        DB::beginTransaction();

        if ($request -> has('image')) {
            if($category -> image != 'default.png'){
                Storage ::disk('public_uploads') -> delete('categories/' . $category -> image);
            }
            $image = $this -> saveImages($request -> image, 'images/categories');
            $data['image'] = $image;
        }
        $data['status'] = $request -> status;

        $category -> update($data);

        DB::commit();

        session() -> flash('success', trans('Updated Successfully'));
        return redirect() -> route('category.index');
    }

    public function destroy($id)
    {
        $category = Category ::find($id);

        DB::beginTransaction();

        if($category -> image != 'default.png'){
            Storage ::disk('public_uploads') -> delete('categories/' . $category -> image);
        }
        $category ->  delete();

        DB::commit();

        session() -> flash('success', trans('deleted successfully'));
        return redirect() -> route('category.index');
    }

}
