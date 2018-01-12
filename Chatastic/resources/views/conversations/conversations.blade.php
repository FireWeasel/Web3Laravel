@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Conversations</div>
                        <div class="panel-body">
                            <ul>
                            @foreach (Auth::user()->conversations as $conversation)
                                <li>
                                  <a href='{{route('conversation.show', ['id' => $conversation->id])}}' class="list-group-item list-group-item-action">
                                    @foreach ($conversation->users as $participant)
                                      {{ $participant->name }},
                                    @endforeach
                                  </a>
                                </li>
                            @endforeach
                            </ul>
                                <a href='{{route('conversations.new')}}'><button class="btn btn-default">Add new conversation</button> </a>
                        </div>
                 </div>
            </div>
        </div>
    </div>
@endsection
