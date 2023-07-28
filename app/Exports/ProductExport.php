<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromQuery, WithHeadings
{

    use Exportable;

    private $columns = ['id', 'name', 'description', 'price', 'sales', 'stock'];

    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Product::query()->select($this->columns);
    }

    public function headings(): array
    {
        return $this->columns;
    }
}

// Lưu ý:
// + Nếu ta muốn xuất file không kèm theo Header thì không cần sử dụng WithHeadings. Ngược lại nếu ta muốn xuất file kèm theo Header thì cần sử dụng
// WithHeadings

// + Khi implements WithHeadings ta sẽ thấy nó báo lỗi does not implement method 'NameOfMethod' => Lúc này ta chỉ việc khai báo 'NameOfMethod' đó thì sẽ
// hết lỗi.
