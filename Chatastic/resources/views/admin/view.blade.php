@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">User overview</div>-->

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#user">Users</a></li>
                                <li><a data-toggle="tab" href="#convo">Conversations</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="user" class="tab-pane fade in active">
                                    <br>
                                    @foreach ($users as $user)
                                        @if($user->type != 'admin')
                                            <div>
                                                <div style="display:inline-block; margin-left:10px; vertical-align:top">
                                                    <img class="img-circle img-responsive img-center" src="/public/img/{{$user-> avatar}}"  width="100px" height="100px" style="border-radius: 50%; /*vertical-align: middle;*/">
                                                </div>

                                                <div style="display:inline-block; margin:40px; vertical-align:middle">
                                                    <p><b>ID: </b> {{$user -> id }}</p>
                                                    <p><b>User Type: </b> {{ $user -> type }}
                                                    <p><b>Email: </b> {{ $user -> email}}</p>
                                                    <p><b>Name: </b> {{ $user -> name}}</p>
                                                </div>

                                                <div style= "display:inline-block; float:right;">
                                                    <a href="{{route('admin.view',$user->id)}}">
                                                        <button class="btn">Visit profile</button>
                                                    </a>
                                                    <a href="{{ route('admin.edit', $user->id)}}">
                                                        <button class="btn" data-toggle="modal" data-target="#myModal">Edit profile</button>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <form class="row text-center" method="POST" action="{{url('getUser')}}">
                                        <input type="hidden" value="PUT" name="_method">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                                        <button type="submit" class="btn btn-success">
                                            Download user excel sheet.
                                        </button>
                                    </form>
                                </div>
                                <div id="convo" class="tab-pane fade">
                                    <br>
                                    <ul>
                                        @foreach($conversations as $conversation)
                                            <li>
                                                <a href='{{route('conversation.show', ['id' => $conversation->id])}}' class="list-group-item list-group-item-action">
                                                    @foreach ($conversation->users as $participant)
                                                        {{ $participant->name }},
                                                    @endforeach
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
