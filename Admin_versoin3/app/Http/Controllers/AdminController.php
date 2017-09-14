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
        $user = Admin::paginate(5);
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
            'name' => 'required|max:300|unique:admins,name',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:6|max:100',
            'passwordAgain' => 'required|same:password',
            'address' => 'required|min:6|max:100'
        ],
        [
            'name.required' => 'You have not entered an name yet',
            'name.max' => 'Name not greater than 100 characters',
            'name.unique' => 'The username already exists',
            'email.required' => 'You have not entered an email yet',
            'email.unique' => 'The email already exists',
            'password.required' => 'You have not entered an password yet',
            'password.min' => 'Password must be least 6 characters',
            'password.max' => 'Password not greater than 100 characters',
            'passwordAgin.required'=> 'You have not entered an password agin yet',
            'passwordAgain.same' => 'Nhập lại mật khẩu chưa đúng',
            'address.required' => 'You have not entered an address yet'
        ]);

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->level = $request->level;
        $admin->address = $request->address;
        $admin->email = $request->email;
        $admin->gender = $request->gender;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('admin.dashboard')->with(['thongbao'=>'Add a successful user']);
    }

    public function getEditUser($id)
    {
        $admin = Admin::find($id);
        return view('admin.edit-user',['admin'=>$admin]);
    }

    public function postEditUser(Request $request, $id)
    {
        $admin = Admin::find($id);
        $this->validate($request,
        [
            'name' => 'required|max:300',
            'email' => 'required',
            'password' => 'min:6|max:100',
            'passwordAgin' => 'same:password'
        ],
        [
            'name.required' => 'Username must be least 6 characters',
            'name.max' => 'Username not greater than 100 characters',
            'email.required' => 'You have not entered an email yet',
            'password.min' => 'Password must be least 6 characters',
            'password.max' => 'Password not greater than 100 characters',
            'passwordAgin.same' => 'Password entered does not match'
        ]);

        $admin->name = $request->name;
        $admin->level = $request->level;
        $admin->address = $request->address;
        $admin->email = $request->email;
        $admin->gender = $request->gender;
        if($request->changePassword == "on")
            $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect('admin/user/edit-user/'.$id)->with(['thongbao'=>'Fix the user successfully']);
    }

    public function deleteUser(Request $request)
    {
        if(Request::ajax()){
            echo 345;
        }
        else
            echo 123;
        // $id = $request->idUser;
        // $admin = Admin::find($id);
        // //echo $id;
        // return Response::json($admin);
        // $admin->delete();
        // return redirect()->route('admin.dashboard')->with(['thongbao'=>'Delete a successful user']);
    }

}
