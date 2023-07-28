<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Khi ta import file có header
        // $product = new Product([
        //     "name" => $row['name'],
        //     "description" => $row['description'],
        //     "price" => $row['price'],
        //     "sales" => $row['sales'],
        //     "stock" => $row['stock'],
        // ]);

        // Khi ta import file không có header (Nhớ remove WithHeadingRow)
        $product = new Product([
            "name" => $row[0],
            "description" => $row[1],
            "price" => $row[2],
            "sales" => $row[3],
            "stock" => $row[4],
        ]);
        return $product;
    }
}

// // Lưu ý:
// + Khi ta nhập file không có Header thì không cần sử dụng WithHeadings. Ngược lại nếu ta nhập file có Header thì cần sử dụng
// WithHeadings
