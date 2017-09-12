<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Admin::all();
        return view('admin.user',['user'=>$user]);
    }

    public function getAddUser()
    {
        return view('admin.add-user');
    }

    public function postAddUser(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|max:300|unique:Users,name',
            'email' => 'required|unique:Users,email',
            'password' => 'required|min:3|max:100',
            'passwordAgain' => 'required|same:password',
            'address' => 'required|min:3|max:100'
        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.max' => 'Tên người dùng phải có tối đa từ 4 đến 100 kí tự',
            'name.unique' => 'Tên người dùng đã tốn tại',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'mật khẩu phải có tối đa từ 4 đến 100 kí tự',
            'password.max' => 'mật khẩu loại phải có tối đa từ 4 đến 100 kí tự',
            'passwordAgin.required'=> 'Bạn chưa nhập lại mật khẩu',
            'passwordAgain.same' => 'Nhập lại mật khẩu chưa đúng',
            'address.required' => 'Nhập địa chỉ không hợp lệ'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->level = $request->level;
        $admin->address = $request->address;
        $admin->email = $request->email;
        $admin->gender = $request->gender;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('admin.dashboard')->with(['thongbao'=>'Thêm người dùng thành công']);
    }

    public function getEditUser($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit-user',['admin'=>$admin]);
    }

}
