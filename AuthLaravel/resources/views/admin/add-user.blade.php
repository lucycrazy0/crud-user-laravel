@extends('admin.layout.index')
@section('title')
    Add User
@endsection
@section('content')
<div class="content container mr-auto mt-4">
<h1 class="text-center mb-2 p-2 text-danger" style="background-color: #ECECEC">ADD USER</h1>
<div class="khung border border-danger p-4">
<form action="{{ route('user.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <fieldset>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">First Name</label>
                    <input type="text" class="form-control" name="first_name" aria-describedby="emailHelp" placeholder="Enter first name ...">
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Display Name</label>
                    <input type="text" class="form-control" name="display_name" aria-describedby="emailHelp" placeholder="Enter display name ...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="font-weight-bold">Password</label>
                    <input type="password" class="form-control" name="password"  id="exampleInputPassword1" placeholder="Enter password ....">
                </div>
                <div class="form-group">
                        <label for="exampleInputPassword1" class="font-weight-bold">Password Agin</label>
                        <input type="password" class="form-control" name="passwordAgain"  id="exampleInputPassword1" placeholder="Enter password again ....">
                </div>
                <div class="form-group">
                    <label for="exampleTextarea" class="font-weight-bold">Address</label>
                    <textarea class="form-control" name="address" id="exampleTextarea" rows="3" placeholder="Enter address ..."></textarea>
            </div>
            </fieldset>
        </div>            
        <div class="col-md-6">
            <div class="form-group">
                        <label for="name" class="font-weight-bold">Last Name</label>
                        <input type="text" class="form-control" name="last_name" aria-describedby="emailHelp" placeholder="Enter last name ...">
            </div>
            <div class="form-group">
                    <label for="exampleInputEmail1" class="font-weight-bold">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email ...">
            </div>
            <div class="form-group">
                <label for="exampleSelect1" class="font-weight-bold">Level</label>
                <select class="form-control" name="level" id="exampleSelect1">
                    <option value="Choose">Choose</option>
                    <option value="1">Admin</option>
                    <option value="0">Member</option>
                </select>
            </div>
            <fieldset class="form-group">
                    <label class="font-weight-bold">Gender</label>
                    <label class="form-check-label ml-3">
                    <input type="radio" class="form-check-input" name="gender" value="0" checked="">
                        Man
                    </label>

                    <label class="form-check-label ml-3">
                    <input type="radio" class="form-check-input" name="gender" value="1">
                        Woman
                    </label>
            </fieldset>
            <div class="form-group">
                <label for="exampleSelect1" class="font-weight-bold">Country</label>
                <select class="form-control" name="country" id="exampleSelect1">
                    <option value="Choose">Choose</option>
                    <option value="VN">VIETNAM</option>
                    <option value="USA">USA</option>
                </select>
            </div>
            <div class="form-group">
                    <label for="name" class="font-weight-bold">Postal Code</label>
                    <input type="text" class="form-control" name="postal_code" aria-describedby="emailHelp" placeholder="Enter Postal Code ...">
            </div>
        </div> 
        <button type="submit" class="btn btn-danger m-auto">Submit</button>
        @if(session('thongbao'))
            <div class="alert alert-success">
            {{session('thongbao')}}
            </div>
        @endif
        @if(count($errors) > 0)
        <div class="alert alert-danger col-md-12 text-center">
          @foreach($errors->all() as $err)
                {{$err}}<br>
          @endforeach
        </div>
        @endif
    </div>
</form> 
</div>    
</div>
@endsection