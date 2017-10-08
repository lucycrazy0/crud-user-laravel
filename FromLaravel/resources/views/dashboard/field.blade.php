@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1 class="text-center"> {{ $form->title }} </h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Submission</th>
                        <th>Field Name</th>
                        <th>Field Value</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=100220; ?>
                    @foreach( $form->submissions as $submissions)
                        @foreach( $submissions->formsubmission as $formsubmission)
                            <tr style="background: #{{ $i }}">
                                <td>{{ $submissions->id }}</td>
                                <td>{{ $formsubmission->field_name }}</td>
                                <td>{{ $formsubmission->field_value }}</td>
                                <td>{{ $formsubmission->created_at }}</td>
                            </tr>
                        @endforeach
                        <?php $i+=122200; ?>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection