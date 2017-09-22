<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
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
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array_filter($request->all());

        $validator = [
            'display_name' => 'required|max:300|unique:users,display_name',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|max:100',
            'passwordAgain' => 'required|same:password',
            'address' => 'required|min:6|max:100'
        ];

        $this->validate($request,$validator);
        
        try {
            $data['password'] = bcrypt($data['password']);
            
            $user = User::create($data);
            
            return redirect('/admin/users/' . $user->id)
                ->with('thongbao', 'User was created successfully!');
            
        } catch (\Exception $e) {
            return back()->withInput()->withMessage($e->getMessage());
        }
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
        return view('users.update',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.update',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = array_filter($request->all());

        $validator = [
            'display_name' => 'required|min:3|max:100',
            'email' => 'required',
            'address' => 'required|min:6|max:100'
        ];
        
        if ( ! empty($data['password'])) {
            $validator['password'] = 'min:6';
            $validator['passwordAgain'] = 'same:password';
        }

        $this->validate($request,$validator);

        try
        {
            if( !empty ($data['password']) )
                $data['password'] = bcrypt($data['password']);

            $user->update($data);

            return redirect('/admin/users/' . $user->id)->with(['thongbao' => 'Fix the user successfully']);
        
        }catch(\Exception $e){
            return back()->withInput()->withMessage($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try
        {
            $user->delete();

            return back()->with(['thongbao'=>'Delete a successful user']);

        }catch(\Exception $e){
            return back()->withInput()->withMessage($e->getMessage());
        }
    }

    public function profile()
    {
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }
}
