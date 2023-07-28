<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AddOrRemoveMultipleInputFields extends Controller
{
    public function index(){
        return view('addorremovemultipleinputfields.index');
    }

    public function store(Request $request){
        $request->validate(
            [
                'inputs.*.name' => 'required',
                'inputs.*.price' => 'required',
                'inputs.*.description' => 'required',
                'inputs.*.sales' => 'required',
                'inputs.*.stock' => 'required',
            ],
            [
                'inputs.*.name' => 'Name is required',
                'inputs.*.price' => 'Price is required',
                'inputs.*.description' => 'Description is required',
                'inputs.*.sales' => 'Sales is required',
                'inputs.*.stock' => 'Stock is required',
            ]
        );

        foreach($request->inputs as $key => $value) {
            Product::create($value);
        }

        return back()->with('success', 'Product has been added !');
    }
}
