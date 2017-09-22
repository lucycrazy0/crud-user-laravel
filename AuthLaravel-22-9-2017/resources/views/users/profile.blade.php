@extends('users.layout.index')
@section('title')
   Profile User
@endsection
@section('content')
<div class="content container mr-auto mt-4">
<h1 class="text-center mb-2 p-2 text-danger" style="background-color: #ECECEC">Profile USER</h1>
<div class="khung border border-danger p-4">
{!! Form::model($user,['method' => 'put', 'url' => '/admin/users/' . $user->id]) !!}
    @include('users._partials.form')
{!! Form::close() !!}
</div>    
</div>
@endsection