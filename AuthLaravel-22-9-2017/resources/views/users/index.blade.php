@extends('users.layout.index')
@section('title')
    User
@endsection
@section('content')
<div class="content container mr-auto mt-4">
        <h1 class="text-center mb-2 p-2 text-danger" style="background-color: #ECECEC">LIST USER</h1>
    <div class="khung">
        <table class="table table-hover table-bordered">
            <thead style="background-color: #555; color: #FFF">
                <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Email</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user as $u)
                <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->last_name}}</td>
                <td>@if($u->level == "admin") {{"Admin"}} @else {{"Member"}} @endif</td>
                <td>{{$u->email}}</td>
                <td>
                    {!! Form::open(['method' => 'delete', 'url' => '/admin/users/' . $u->id]) !!}
                        <a href="{{ url('/admin/users/' . $u->id) }}" class="btn btn-sm btn-primary"><i
                                    class="glyphicon glyphicon-edit"></i> Edit</a>
                        <button type="submit" class="btn btn-danger btn-sm"><i
                                    class="glyphicon glyphicon-trash"></i> Delete
                        </button>
                    {!! Form::close() !!}
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(session('thongbao'))
            <div class="alert alert-success text-center">
            {{session('thongbao')}}
            </div>
        @endif
        <div class="page">
            <ul class="pagination">
                <li class="page-item disabled">
                <a class="page-link" href="#">&laquo;</a>
                </li>
                <li class="page-item active">
                <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">5</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="#">&raquo;</a>
                </li>
            </ul>
        </div>
    </div>    
</div> 
@endsection