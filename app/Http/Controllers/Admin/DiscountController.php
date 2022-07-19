<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Discount;
use App\Product;
use App\Category;
use Carbon\Carbon;


class DiscountController extends Controller
{
    //
    public function index()
    {
        $discounts = Discount ::paginate(10);
        foreach ($discounts as $d) {
            if ($d -> to < Carbon ::now() -> format('Y-m-d')) {
                // dd('hi');
                $d -> delete();
            }
        }



        return view('admin.discount.index', compact('discounts'));
    }


    public function create()
    {
        $category = Category ::select('id','name_'.app()->getLocale().' as cat_name')->get();
        $product = Product::select('id','name_'.app()->getLocale().' as name')->get();
        return view('admin.discount.create', compact('category','product'));
    }

    public function store(Request $request)
    {
        $data = $request -> validate([
            'product_id' => 'required',
            'discount' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
            'discount_type' => 'required',
        ]);

        $data['published'] = $request -> published;

        Discount ::create($data);
        session() -> flash('success', trans('added successfully'));
        return redirect() -> route('discount.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $discount = Discount ::find($id);
        $category = Category ::all();


        return view('admin.discount.edit', compact('discount', 'category'));
    }

    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'product_id' => 'required',
            'discount' => 'required|numeric',
            'from' => 'required',
            'to' => 'required',
            'discount_type' => 'required',


        ]);

        $discount = Discount ::find($id);

        $data['published'] = $request -> published;

        $discount -> update($data);
        session() -> flash('success', trans('Updated Successfully'));
        return redirect() -> route('discount.index');
    }


    public function destroy($id)
    {
        Discount ::where('id', $id) -> delete();
        session() -> flash('success', trans('deleted successfully'));
        return redirect() -> route('discount.index');
    }


    public function getCategoryProduct($id)
    {
        $product = [];
        $products = Product ::where('category_id', $id) -> get();
        foreach ($products as $p) {
            if (($p -> discount == null)) {
                $product[] = $p;
            }

        }

        return response() -> json(['data' => $product]);
    }

}
