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
                            {{--<div class="pull-left">--}}
                            <img src="/public/img/{{$user->avatar}}" onmouseover="pixelate(this)" onmouseout="this.src='/public/img/{{$user->avatar}}';" width="100px" height="100px" style="border-radius: 50%; /*vertical-align: middle;*/">
                            {{--<button class="btn btn-default" data-toggle="modal" data-target="#addImageModal">Change Image</button>--}}
                            {{--</div>--}}
                        </div> <br>
                        <div class="col-md-4">
                            <p>Name: <label for="name">{{$user->name}}</label></p>
                            <p>Email: <label for="email">{{$user->email}}</label></p>
                            <p>Gender: <label for="gender">{{$user->gender}}</label></p>
                            <p>Age: <label for="age">{{$user->age}}</label> </p>
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['profile.delete', $user]
                                ]) !!}
                            {!! Form::submit('Delete account', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection