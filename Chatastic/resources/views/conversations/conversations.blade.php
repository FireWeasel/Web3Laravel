@extends('layouts.app')

@section('content')
<h1>Conversations</h1>
<ul>
@foreach (Auth::user()->conversations as $conversation)
    <li>
      <a href='{{route('conversation.show', ['id' => $conversation->id])}}'>
        @foreach ($conversation->users as $participant)
          {{ $participant->name }},
        @endforeach
      </a>
    </li>
@endforeach
</ul>
@endsection
