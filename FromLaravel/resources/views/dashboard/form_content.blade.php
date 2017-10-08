@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1 class="text-center"> LIST FORMS </h1>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title Forms</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($forms))
                        @foreach( $forms as $form)
                            <tr>
                                <td>{{ $form->id }}</td>
                                <td>{{ $form->title }}</td>
                                <td>{{ 'http://fromlaravel.dev:82/'.$form->id }}</td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'url' => '#']) !!}
                                    <a href="{{ url('#') }}" class="btn btn-sm btn-primary"><i>
                                        </i> Edit</a>
                                    <button type="submit" class="btn btn-warning btn-sm"><i>
                                        </i> Delete
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection