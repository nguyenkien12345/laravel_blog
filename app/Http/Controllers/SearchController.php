<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

// Controller này sẽ xử lý toàn bộ các logic liên quan đến tìm kiếm

class SearchController extends Controller
{
    public function query(Request $request)
    {
        if ($request->has('search')) {
            $products = Product::search($request->search)->get();
        } else {
            $products = Product::get();
        }
        return view('search.index', \compact('products'));
    }
}
