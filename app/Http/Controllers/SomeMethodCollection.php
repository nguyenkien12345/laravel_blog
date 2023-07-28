<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SomeMethodCollection extends Controller
{
    public function index()
    {
        $products = Product::all();

        // 1) partition()
        // Ta dùng khi muốn chia Collection thành 2 phần theo một điều kiện nào đó.
        // Ví dụ ta muốn tách danh sách products ra thành một bên có sale lớn hơn hoặc bằng 1000000 và bên còn lại có sale nhỏ hơn 1000000, ta sẽ làm như sau:

        // list($greaterEqual1Million, $lessF1Million) = $products->partition(function ($product) {
        //     return $product->sales >= 1000000;
        // });

        // dd($greaterEqual1Million, $lessF1Million);
        // => $greaterEqual1Million sẽ chứa kết quả các product có sales lớn hơn hoặc bằng 1000000, còn $lessF1Million sẽ chưa các product có sales nhỏ hơn 1000000
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 2) toArray(), toJson()
        // Để chuyển từ dạng Object sang dạng mảng hoặc kiểu dữ liệu Json.
        // $productArray = $products->toArray();
        // $productJson = $products->toJson();

        // dd($productArray, $productJson);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 3) first(), last()
        // Khi bạn chỉ muốn lấy phần từ đầu tiền của Collection, thì ta dùng first(). Ngược lại nếu bạn muốn lấy phần từ cuối cùng thì ta dùng last().
        // Ngoài ra bạn có thể thêm điều kiện để lấy phần tử cho phù hợp, kết quả trả về 1 Eloquent nếu tìm thấy phần tử đầu tiên thoả mãn, còn không thì trả về null.
        // $firstProduct = $products->first(); // Trả về phần từ đầu tiên của Collection và sẽ là một Eloquent
        // $lastProduct = $products->last();  // Trả về phần từ cuối cùng của Collection và sẽ là một Eloquent
        // $firstConditionProduct = $products->first(function ($product, $key) {
        //     return $product->price > 6000000; // Trả về product đầu tiên có price > 6000000 theo thứ tự trong bản ghi
        // });
        // $lastConditionProduct = $products->last(function ($product, $key) {
        //     return $product->price > 6000000; // Trả về product đầu tiên có price > 6000000 theo thứ tự trong bản ghi
        // });
        // dd($firstProduct, $lastProduct, $firstConditionProduct, $lastConditionProduct);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 4) map()
        // Đây cũng là phương thức tương tự trong Javascript, bạn có thể tạo ra một Collection mới dựa theo Collection cũ với một số thay đổi nào đó;
        // Ví dụ mình muốn cộng vào stock của mỗi sản phẩm 5 đơn vị thì ta có thể làm như sau:
        // $newProducts = $products->map(function ($product, $key) {
        //     $product->stock += 5;
        //     return $product;
        // });
        // dd($newProducts);
        // => $newProducts là Collection mới có stock của mỗi product được cộng thêm 5 so với mỗi product trong $products.
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 5) filter()
        // Ai hay sử dụng Javascript thì sẽ thấy phuơng thức cách sử dụng phương thức này cho Collection cũng hoàn toàn giống nhau,
        // ta sẽ lọc các bản ghi theo một điều kiện nào đó. Giờ giả sử ta chỉ muốn lấy những product có price lớn hơn 5000000, thì ta sẽ dùng như sau:
        // $filterProducts = $products->filter(function ($product, $key) {
        //     return $product->price > 5000000;
        // });
        // dd($filterProducts);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 5) every()
        // Phương thức này trả về kết quả boolean(true/false), bằng cách kiểm tra xem tất cả bản ghi có thỏa mãn điều kiện nào đó hay không?
        // $greaterEqual1Million = $products->every(function ($product, $key) {
        //     return $product->price > 1000000;
        // });
        // dd($greaterEqual1Million);
        // => Nếu toàn bộ product trong bản ghi trên có price lớn hơn 1000000 thì trả về true, còn không thì trả về false;
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 6) chunk()
        // Đây có lẽ là một method khá tiện ích, khi ta muốn nhóm một số lượng bản ghi thành các nhóm nhỏ để thuận tiện cho việc show hoặc xử lý dữ liệu.
        // $chunkProducts = $products->chunk(2);
        // dd($chunkProducts);
        // =>  Nó sẽ là Collection chứa 3 Collection với key lần lượt là 0,1,2 (Vì lúc này có tổng cộng 5 items)
        // Để sử dụng thì ta chỉ cần dùng foreach như bình thường
        // foreach ($chunkProducts as $chunkProduct) {
        //     // Do something
        //     foreach ($chunkProduct as $product) {
        //         //Do something
        //     }
        // }
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 7) collapse()
        // Đây là method ngược lại với method chunk(), sau khi tách ra thành các nhóm bản ghi nhỏ thì ta có thể gộp chúng lại thành 1 Collection duy nhất bằng cách sử dụng collapse().
        // $collapseProducts = $chunkProducts->collapse();
        // dd($collapseProducts);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 8) avg(), average()
        // Đây là hàm giúp ta tính giá trị trung bình của một trường của toàn bộ bản ghi trong Collection.
        // $productAvgStock = $products->avg('stock');
        // dd($productAvgStock);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 9) isEmpty(), isNotEmpty()
        // isEmpty: Trả về true nếu không có bản ghi nào trong Collection, nếu có thì trả false
        // isNotEmpty: Hàm này ngược với hàm ở trên thôi.
        // $isEmpty = $products->isEmpty();
        // $isNotEmpty = $products->isNotEmpty();
        // dd($isEmpty, $isNotEmpty);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 10) max(), min()
        // max(): Lấy giá trị lớn nhất của một field nào đó trong bản ghi
        // min(): Lấy giá trị nhỏ nhất của một field nào đó trong bản ghỉ
        // $priceMax = $products->max('price');
        // $priceMin = $products->min('price');
        // dd($priceMax, $priceMin);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 11) count()
        // Đơn giản là trả về số bản ghi có trong Collection
        // $productCount = $products->count();
        // dd($productCount);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 12) pluck()
        // Phuơng thức này khá hữu dụng trong một số trường hợp, dùng để lấy toàn bộ một field nào đó và trả về mảng chứa giá trị của tất cả các field đó.
        // Thông thường mình hay dùng để lấy toàn bộ id có trong bản ghi để dùng trong các điều kiện whereIn.
        // $productIds = $products->pluck('id');
        // dd($productIds);
        // --------------------------------------------------------------------------------------------------------------------------------------------------------

        // 13) each()
        // Đây là cách lặp qua các phần tử của Collection, cũng tương tự như khi ta dùng foreach
        // $products->each(function ($product, $key) {
        //     echo $product->id;
        // });

        // Cũng không khác gì so với ta dùng cách foreach truyền thống.
        // foreach ($products as $key => $product) {
        //     echo $product->id;
        // }

        // => Tuy nhiên thì ta có thể đặt điều kiện để ngắt vòng lặp bằng cách return false
        $products->each(function ($product, $key) {
            if ($product->id > 3) {
                return false; // Khi product có id > 3 thì sẽ dừng vòng lặp
            }
            echo $product->id;
        });
    }
}
