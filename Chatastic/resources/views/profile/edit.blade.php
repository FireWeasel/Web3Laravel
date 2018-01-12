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
                            {!! Form::model($user, [
                                    'method' => 'PATCH',
                                    'route' => ['admin.update', $user->id],
                                    'enctype'=> 'multipart/form-data',
                                    'files' => true
    ])                           !!}
                        <div class="col-md-4">
                            <img src="/public/img/{{$user->avatar}}" width="100px" height="100px" style="border-radius: 50%;">
                            <input type="file" name="image" class="form-control" id="avatar">

                                <label for="name">Name:</label><input type="text" class="form-control" name="name" id="changedName" value="{{$user->name}}"><br>
                                <label for="age">Age:</label><input type="text" class="form-control" name="age" id="changedAge" value="{{$user->age}}"><br>
                                <label for="gender">Gender:</label>
                                <select name="gender" class="">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="unicorn">Undefined</option>
                                </select>
                                <hr>
                                <div class="col-md-2"><button type="submit" class="btn btn-primary">Change information</button></div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection