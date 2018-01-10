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
                            <img src="/public/img/{{Auth::user()->avatar}}" onmouseover="pixelate(this)" onmouseout="this.src='/public/img/{{Auth::user()->avatar}}';" width="100px" height="100px" style="border-radius: 50%; /*vertical-align: middle;*/">
                            {{--<button class="btn btn-default" data-toggle="modal" data-target="#addImageModal">Change Image</button>--}}
                            {{--</div>--}}
                        </div> <br>
                        <div class="col-md-4">
                            <p>Name: <label for="name">{{Auth::user()->name}}</label></p>
                            <p>Email: <label for="email">{{Auth::user()->email}}</label></p>
                            <p>Gender: <label for="gender">{{Auth::user()->gender}}</label></p>
                            <p>Age: <label for="age">{{Auth::user()->age}}</label> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection