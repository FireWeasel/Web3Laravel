@extends('layouts.app')

@section('content')
<h1>
  @foreach($conversation->users as $participant)
    {{$participant->name}},
  @endforeach
</h1>
<hr>
@foreach($conversation->messages as $message)
  <p>{{$message->user->name}}: {{$message->message}}</p>
@endforeach
@endsection
