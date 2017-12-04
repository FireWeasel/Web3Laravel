@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User information</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="col-md-3" >
                            <img src="/public/img/{{Auth::user()->avatar}}" width="100px" height="100px" style="border-radius: 50%;">
                        </div> <br>
                        <div class="col-md-4">
                            {!! Form::model(Auth::user(), [
                                'method' => 'PATCH',
                                'route' => ['profile.update', Auth::user()->id]
])                           !!}
                                <label for="name">Name:</label><input type="text" class="form-control" name="name" id="changedName" value="{{Auth::user()->name}}"><br>
                                <label for="email">Age:</label><input type="text" class="form-control" name="age" id="changedName" value=""><br>
                                <label for="gender">Gender:</label>
                                <select name="gender" class="">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="unicorn">Undefined</option>
                                </select>
                                <hr>
                                <div class="col-lg-8"><button class="btn btn-default">Change Image</button></div>
                                <div class="col-md-2"><button type="submit" class="btn btn-primary">Change information</button></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection