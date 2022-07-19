<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;
use App\Traits\imagesTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class RegionsController extends Controller
{
    use imagesTrait;

    public function index()
    {
        $regions = Region ::paginate(10);
        return view('admin.region.index', compact('regions'));
    }

    public function create()
    {
        return view('admin.region.create');
    }

    public function store(Request $request)
    {
        $data = $request -> validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'fees' => 'required',


        ]);



        Region ::create($data);
        session() -> flash('success', trans('added successfully'));
        return redirect() -> route('region.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $region = Region ::find($id);
        return view('admin.region.edit', compact('region'));

    }

    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'fees' => 'required',
        ]);

        $region = Region ::find($id);

        DB::beginTransaction();


        $region -> update($data);

        DB::commit();

        session() -> flash('success', trans('Updated Successfully'));
        return redirect() -> route('region.index');
    }

    public function destroy($id)
    {
        $region = Region ::find($id);

        DB::beginTransaction();

        
        $region ->  delete();

        DB::commit();

        session() -> flash('success', trans('deleted successfully'));
        return redirect() -> route('region.index');
    }

}
