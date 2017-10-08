@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h1> LIST FORMS </h1>
                    <div class="text-center">
                        {!! Form::open(['url' => 'dashboard/form', 'method' => 'get']) !!}
                            {!! Form::text('sreach',null,['class' => 'form-control']) !!}
                            {!! Form::submit('Sreach', ['class' => 'form-control btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title Forms</th>
                        <th>Link</th>
                        <th>By</th>
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
                                <td>{{ $form->user->display_name }}</td>
                                <td>
                                    {!! Form::open(['method' => 'delete', 'url' => '#']) !!}
                                    <a href="{{ url('dashboard/'.$form->id.'/edit') }}"
                                       class="btn btn-sm btn-primary"><i>
                                        </i> Edit</a>
                                    <button type="submit" class="btn btn-warning btn-sm"><i>
                                        </i> Delete
                                    </button>
                                    <a href="{{ url('dashboard/'.$form->id) }}" class="btn btn-info btn-sm"><i>
                                        </i> Seen Field</a>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

                {!! $forms->links() !!}
            </div>
        </div>
    </div>
@endsection