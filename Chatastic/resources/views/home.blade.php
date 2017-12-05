@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::check())
                    Greetings {{Auth::user()-> name}}, have a nice day! Fact of the day: your gender is {{Auth::user()->gender}}. <br>
                        @else
                    Welcome to Chatastic, an application for chatting!
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
