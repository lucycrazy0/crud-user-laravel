@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1 class="text-center"> SEND FORMS </h1>
                <form action="http://fromlaravel.dev:82/10" method="post">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text"  class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="question">Question *</label>
                        <textarea name="question" id="question" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-primary" value="SEND">
                    </div>
                </form>
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