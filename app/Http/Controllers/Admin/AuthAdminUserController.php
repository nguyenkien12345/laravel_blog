<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;

class AuthAdminUserController extends Controller
{
    public function showlogin()
    {
        return view('admin.login.index');
    }

    public function checkLogin(Request $request)
    {
        $rules = ['username' => 'required', 'password' => 'required'];

        $message = [
            'username.required' => 'Vui lòng nhập Username',
            'password.required' => 'Vui lòng nhập Password',
        ];

        $request->validate($rules, $message);

        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['email' => $username, 'password' => $password]) || Auth::attempt(['mobile' => $username, 'password' => $password])) {
            return redirect()->route('admin.category.index');
        } else {
            return redirect()->route('admin.auth.show-login')->with('error', 'Tài khoản không hợp lệ');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.show-login');
    }

    public function profile()
    {
        return view('admin.login.profile');
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
        ];

        $message = [
            'name.required' => 'Vui lòng nhập Name',
            'name.min' => 'Độ dài tối thiểu của Name là 3',
            'name.max' => 'Độ dài tối đa của Name là 255',
        ];

        $request->validate($rules, $message);

        try {
            DB::beginTransaction();

            $user = Auth::user();

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;

            $dataUpdated = [
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
            ];

            if ($request->password) {
                // dd($request->password);
                $dataUpdated['password'] = $request->password;
            }

            $user->update($dataUpdated);

            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'Update Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
