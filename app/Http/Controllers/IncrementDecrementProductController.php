<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IncrementDecrementProductController extends Controller
{
    public function index()
    {
        // Sử dụng phương thức increment và decrement
        // $number = 5;
        // // Tăng field sales trong đối tượng Product lên 5
        // $sales = Product::where('id', 1)->increment('sales', $number);
        // // Giảm field stock trong đối tượng Product xuống 5
        // $stock = Product::where('id', 1)->decrement('stock', $number);

        // $product = Product::where('id', 1)->get();

        // Sử dụng phương thức incrementEach và decrementEach
        // $product = Product::where('id', 1)->incrementEach([
        //     'price' => 200,
        //     'sales' => 100,
        //     'stock' => 5
        // ]);
        // Tăng lần lượt các filed price lên 200, sales lên 100, stock lên 5

        // $product = Product::where('id', 1)->decrementEach([
        //     'price' => 200,
        //     'sales' => 100,
        //     'stock' => 5
        // ]);
        // Giảm lần lượt các filed price xuống 200, sales xuống 100, stock xuống 5

        // $product = Product::where('id', 1)->get();
        // dd($product);
    }
}
