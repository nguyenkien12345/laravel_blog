<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Str;

class PdfController extends Controller
{
    public function download()
    {
        $content = 'NGUYỄN TRUNG KIÊN VÀ MAI THỊ THANH THÚY';
        $code = 'NTKVSMTTT';
        $date = '30/07/2023 12:00';
        // Để download được ảnh trong pdf bắt buộc phải đưa ảnh về kiểu base 64
        $pathImage = public_path() . '/mttt.jpg';
        $typeImage = pathinfo($pathImage, PATHINFO_EXTENSION);
        $data = file_get_contents($pathImage);
        $image = 'data:image/' . $typeImage . ';base64,' . base64_encode($data);

        // Đặt tên cho file pdf
        $namePDF = 'Coupon Code ' . time() . rand(10000, 99999) . Str::random('10') . '.pdf';
        // pdf.coupon: Mặc định vào folder views => folder pdf => file coupon.blade.php để lấy view download
        $pdf = PDF::loadView('pdf.coupon', ['content' => $content, 'code' => $code, 'date' => $date, 'image' => $image]);
        // setPaper(): Đặt kích thước giấy là A4 ('Letter', 'Legal', '210mm', '297mm');
        // setOrientation(): Đặt hướng giấy cho tài liệu PDF. 'portrait' (chế độ dọc) hoặc 'landscape' (chế độ ngang).
        $pdf->setPaper('A4', 'landscape');
        // setWarnings(): Bật hoặc tắt cảnh báo trong quá trình tạo tài liệu PDF
        $pdf->setWarnings(false);
        // setOption(): Đặt các tùy chọn như 'isHtml5ParserEnabled', 'isRemoteEnabled', 'isJavascriptEnabled',
        $pdf->setOption('isHtml5ParserEnabled', true);
        // Cứ mỗi 1 lần download là ta sẽ lưu file này vô folder pdfs trong folder public trước khi thực hiện download
        $pdf->save(public_path('pdfs/' . $namePDF));
        return $pdf->stream($namePDF);

        // Download file html thành file pdf lấy từ folder public
        // Nếu báo lỗi:
        // Vào cmd gõ php.ini kiếm đến dòng ;extension=gd bỏ dấu ; trước thằng này đi là được
        // return PDF::loadFile(public_path() . '/thanks/index.html')->save(public_path('pdfs/' . $namePDF))->stream($namePDF);
    }
}
