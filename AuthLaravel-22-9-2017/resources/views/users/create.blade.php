@extends('users.layout.index')
@section('title')
    Add User
@endsection
@section('content')
<div class="content container mr-auto mt-4">
<h1 class="text-center mb-2 p-2 text-danger" style="background-color: #ECECEC">ADD USER</h1>
<div class="khung border border-danger p-4">
    {!! Form::open(['url' => 'admin/users', 'method' => 'post']) !!}
        @include('users._partials.form');
    {!! Form::close() !!}
</div>    
</div>
@endsection