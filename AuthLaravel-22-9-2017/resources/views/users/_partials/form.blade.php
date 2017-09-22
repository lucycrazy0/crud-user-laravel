<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label class="font-weight-bold">First Name</label>
                {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name', 'placeholder' => 'Enter first name ...']) !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Display Name</label>
                {!! Form::text('display_name', null, ['class' => 'form-control', 'id' => 'display_name', 'placeholder' => 'Enter display name ...']) !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Password</label>
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'name' => 'password', 'placeholder' => 'Enter password ...']) !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Password Again</label>
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'name' => 'passwordAgain', 'placeholder' => 'Enter password agin ...']) !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Address</label>
                {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Enter address ...']) !!}
        </div>
    </div>            
    <div class="col-md-6">
            <div class="form-group">
                <label for="last_name" class="font-weight-bold">Last Name</label>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'placeholder' => 'Enter last name ...']) !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Gender</label>
                {!! Form::select('gender',[
                    
                    'man' => 'Man',
                    'woman' => 'Woman',

                    ],null,['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="font-weight-bold">Email address</label>
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email ...']) !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Level</label>
                {!! Form::select('level',[
                    
                    'admin' => 'Admin',
                    'member' => 'Member',

                    ],null,['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Country</label>
                {!! Form::select('country',[
                    
                    'VN' => 'VIETNAM',
                    'USA' => 'USA',

                    ],null,['class' => 'form-control']) 
                !!}
            </div>
            <div class="form-group">
                    <label for="name" class="font-weight-bold">Postal Code</label>
                    {!! Form::text('postal_code', null, ['class' => 'form-control', 'id' => 'postal_code', 'placeholder' => 'Enter postal code ...']) !!}
            </div>
    </div> 
    <button type="submit" class="btn btn-danger m-auto">Submit</button>
</div>
@if(session('thongbao'))
        <div class="alert alert-success text-center mt-2">
        {{session('thongbao')}}
        </div>
    @endif
@if(count($errors) > 0)
<div class="alert alert-danger col-md-12 text-center mt-2">
    @foreach($errors->all() as $err)
        {{$err}}<br>
    @endforeach
</div>
@endif