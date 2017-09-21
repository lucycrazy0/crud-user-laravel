<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'display_name' => 'required|max:300|unique:users,display_name',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:100',
            'passwordAgain' => 'required|same:password',
            'address' => 'required|min:6|max:100'
        ],
        [
            'display_name.required' => 'You have not entered an name yet',
            'display_name.max' => 'Name not greater than 100 characters',
            'display_name.unique' => 'The username already exists',
            'email.required' => 'You have not entered an email yet',
            'email.unique' => 'The email already exists',
            'password.required' => 'You have not entered an password yet',
            'password.min' => 'Password must be least 6 characters',
            'password.max' => 'Password not greater than 100 characters',
            'passwordAgin.required'=> 'You have not entered an password agin yet',
            'passwordAgain.same' => 'Password entered incorrectly',
            'address.required' => 'You have not entered an address yet'
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->display_name = $request->display_name;
        $user->country = $request->country;
        $user->postal_code = $request->postal_code;
        $user->level = $request->level;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index')->with(['thongbao'=>'Add a successful user']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.edit-user',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit-user',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,
        [
            'display_name' => 'required|max:300',
            'email' => 'required',
            'password' => 'min:6|max:100',
            'passwordAgain' => 'same:password',
            'address' => 'required|min:6|max:100'
        ],
        [
            'display_name.required' => 'You have not entered an name yet',
            'display_name.max' => 'Name not greater than 100 characters',
            'email.required' => 'You have not entered an email yet',
            'password.min' => 'Password must be least 6 characters',
            'password.max' => 'Password not greater than 100 characters',
            'passwordAgain.same' => 'Password entered incorrectly',
            'address.required' => 'You have not entered an address yet'
        ]);
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->display_name = $request->display_name;
        $user->country = $request->country;
        $user->postal_code = $request->postal_code;
        $user->level = $request->level;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->gender = $request->gender;
        if($request->changePassword == "on")
            $user->password = bcrypt($request->password);
        $user->save();
        return back()->with(['thongbao'=>'Fix the user successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return back()->with(['thongbao'=>'Delete a successful user']);
    }
}
