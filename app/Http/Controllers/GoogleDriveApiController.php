<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class GoogleDriveApiController extends Controller
{
    public function index()
    {
        return view('googledriveapi.index');
    }

    // Put File
    public function store(Request $request)
    {
        // *************** TEST VERSION 1 (FAIL) (Dùng driver) ***************
        // $file = $request->file('image_name');
        // $fileName = explode('.', $file->getClientOriginalName())[0] . '-' . time() . '.' . $file->getClientOriginalExtension();
        // putFileAs nhận vào 3 tham số:
        // 1 là Folder name (folderId mà ta muốn lưu file vào). Nếu ta không truyền gì thì nó sẽ lưu vào folderId mặc định ở file env
        // 2 là file
        // 3 là tên file
        // Storage::disk("google")->putFileAs("", $file, $fileName);
        // return response()->json([
        //     'code' => 1,
        //     'message' => 'success',
        //     'time' => date(now()),
        // ], 200);

        // *************** TEST VERSION 2 (SUCCESS) (Không dùng (Dùng driver)) ***************
        $file = $request->file('image_name');
        $fileName = explode('.', $file->getClientOriginalName())[0] . '-' . time() . '.' . $file->getClientOriginalExtension();
        // Nó sẽ lưu ảnh vào folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        Gdrive::put($fileName, $file);
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'time' => date(now()),
        ], 200);
    }

    // Get File
    public function getFile($filename)
    {
        // Nó sẽ lấy ảnh từ folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        $data = Gdrive::get('/' . $filename);
        return response($data->file, 200)
            ->header('Content-Type', $data->ext);
    }

    // Download file
    public function downloadFile($filename)
    {
        // Nó sẽ download ảnh từ folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        $data = Gdrive::get('/' . $filename);
        return response($data->file, 200)
            ->header('Content-Type', $data->ext)
            ->header('Content-disposition', 'attachment; filename="' . $data->filename . '"');
    }

    // Delete File
    public function deleteFile($filename)
    {
        // Nó sẽ xóa ảnh từ folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        Gdrive::delete('/' . $filename);
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'time' => date(now()),
        ], 204);
    }

    // Delete directory
    public function deleteDirectory(Request $request)
    {
        $folderNameEnv = env('GOOGLE_DRIVE_FOLDER');
        $foldername = $request->foldername;
        $folderDelete = $foldername ? $foldername : $folderNameEnv;
        // Nó sẽ xóa folder con nằm trong folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        Gdrive::deleteDir($folderDelete);
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'time' => date(now()),
        ], 204);
    }

    // Make directory
    public function makeDirectory($filename)
    {
        // Nó sẽ tạo folder con nằm trong folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        Gdrive::makeDir($filename);
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'time' => date(now()),
        ], 200);
    }

    // Rename directory
    public function renameDirectory(Request $request)
    {
        // Nó sẽ đổi tên folder con cũ thành tên folder con mới nằm trong folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        $oldFileName =  $request->oldFileName;
        $newFileName = $request->newFileName;
        // dd($oldFileName, $newFileName);
        Gdrive::renameDir($oldFileName,  $newFileName);
        return response()->json([
            'code' => 1,
            'message' => 'success',
            'time' => date(now()),
        ], 200);
    }

    // Get All Directory
    public function getAllDirectoryAndFile()
    {
        // Nó sẽ lấy ra tất cả các folder con, file nằm trong folder MaiThiThanhThuy trên google drive mà ta setup bên key GOOGLE_DRIVE_FOLDER trong file env
        $data = Gdrive::all('/');
        return response()->json([
            'code' => 1,
            'data' => $data,
            'message' => 'success',
            'time' => date(now()),
        ], 200);
    }
}
