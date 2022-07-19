<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
{

    public function index()
    {
        $branches = Branch::paginate(10);
        return view('admin.branch.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branch.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'address_en' => 'required|string',
            'address_ar' => 'required|string',
            'area_en' => 'required|string',
            'area_ar' => 'required|string',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'phone' => 'required|string',
            'package_per_day' => 'required|numeric',
        ]);

        $data['status'] = $request->status;

        Branch::create($data);
        session()->flash('success', trans('added successfully'));
        return redirect()->route('branch.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.branch.edit', compact('branch'));

    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'address_en' => 'required|string',
            'address_ar' => 'required|string',
            'area_en' => 'required|string',
            'area_ar' => 'required|string',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'phone' => 'required|string',
        ]);

        $branch = Branch::find($id);

        $data['status'] = $request->status;

        $branch->update($data);
        session()->flash('success', trans('Updated Successfully'));
        return redirect()->route('branch.index');
    }

    public function destroy($id)
    {
        Branch::where('id', $id)->delete();
        session()->flash('success', trans('deleted successfully'));
        return redirect()->route('branch.index');
    }

}
