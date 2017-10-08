@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>Create Form</h2>
                {!! Form::open(['url' => 'my/myforms', 'method' => 'post']) !!}
                    <div class="alert alert-info"> We would love to hear from you! Please fill out the form below and we will get in touch with you as quickly as we can. </div>

                    <div class="form-group">
                        {!! Form::label('Title', 'TITLE *') !!}
                        {!! Form::text('title',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('CREATE FORM',['class' => 'form-control btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}

                @if(session('messenge') || session('link'))
                    <div class="alert alert-success text-center mt-2">
                        {{session('messenge')}}<br>
                        {{session('link')}}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection