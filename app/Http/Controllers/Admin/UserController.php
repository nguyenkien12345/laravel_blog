<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required|unique:users,mobile|min:10|max:10',
            'password' => 'required|min:6|max:64',
            'confirm_password' => 'same:password',
        ];

        $message = [
            'name.required' => 'Vui lòng nhập Name',
            'name.min' => 'Độ dài tối thiểu của Name là 3',
            'name.max' => 'Độ dài tối đa của Name là 255',

            'email.required' => 'Vui lòng nhập Email',
            'email.unique' => 'Email này đã tồn tại',
            'email.email' => 'Định dạng email không hợp lệ',

            'phone.required' => 'Vui lòng nhập phone',
            'phone.min' => 'Độ dài tối thiểu của phone là 10',
            'phone.max' => 'Độ dài tối đa của phone là 10',
            'phone.unique' => 'Số điện thoại này đã tồn tại',

            'password.required' => 'Vui lòng nhập Password',
            'password.min' => 'Độ dài tối thiểu của Password là 3',
            'password.max' => 'Độ dài tối đa của Password là 64',

            'confirm_password.same' => 'Mật khẩu và mật khẩu xác thực không trùng khớp'
        ];

        $request->validate($rules, $message);

        try {
            DB::beginTransaction();

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $isAdmin = (int)$request->is_admin;
            $password = $request->password;

            $this->user->create([
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'is_admin' => $isAdmin,
                'password' => $password
            ]);

            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'Create Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
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

            $user = $this->user->find($id);

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $isAdmin = (int)$request->is_admin;
            $password = $request->password ? $request->password : $user->password;

            $dataUpdated = [
                'name' => $name,
                'email' => $email,
                'mobile' => $phone,
                'is_admin' => $isAdmin,
                'password' => $password
            ];

            $user->update($dataUpdated);

            DB::commit();

            return redirect()->route('admin.user.index')->with('success', 'Update Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $user = $this->user->find($id);
            $user->delete();

            DB::statement("ALTER TABLE users AUTO_INCREMENT = 1");

            DB::commit();

            return back()->with('success', 'Delete Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
