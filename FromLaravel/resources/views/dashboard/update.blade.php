@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">{{ $forms->title }}</h1>
                {!! Form::model($forms,['url' => 'dashboard/' . $forms->id, 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title*') !!}
                        {!! Form::text('title',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('by', 'By ') !!}
                        {!! Form::text('user_id',$forms->user->display_name,['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('created_at', 'Created At ') !!}
                        {!! Form::text('created_at',null,['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('UPDATE FORM',['class' => 'btn btn-primary form-control']) !!}
                    </div>
                {!! Form::close() !!}

                @if(session('messenge'))
                    <div class="alert alert-success text-center mt-2">
                        {{session('messenge')}}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger col-md-12 text-center mt-2">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection