<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ZipAndDownloadController extends Controller
{
    public function zipAndDownloadFile()
    {
        // Tạo 1 instance mới của ZipArchive
        $zip = new ZipArchive;

        // Đặt tên cho file zip
        $zipFileName = 'demoDownloadFiles.zip';

        // Tạo 1 file zip mới trong folder zip nằm trong public
        if ($zip->open(public_path('zip/' .  $zipFileName),  ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            // Lấy ra tất cả các file trong folder cần zip
            $files = File::files(public_path('image/images'));
            // Thêm từng file vào folder zip
            foreach ($files as $file) {
                $zip->addFile($file, basename($file));
            }

            // Đóng file zip
            $zip->close();
        }

        return response()->download(public_path('zip/' . $zipFileName));
    }
}
