@extends('layouts.app')

<style lang="css">
  .chat-composer {
    display: flex;
  }

  .chat-composer input {
    flex: 1 auto;
  }

  .chat-composer button {
    border-radius: 0;
  }
</style>

@section('content')
<div class="panel-heading" style="text-align: center; font-size: 24px;">
  @foreach($conversation->users as $participant)
    {{$participant->name}},
  @endforeach
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <chat-log :messages="{{$conversation->messages}}"></chat-log>
        </div>
    </div>
    <div class="row">
      <div class="col-md-8-col-md-offset-2">
        <div class="chat-composer">
          <input id="messageText" type="text" placeholder="Start typing your message...">
          <button type="button" class="btn btn-primary" onclick="sendMessagee()">Send</button>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  function sendMessagee() {
    var url = '{!! url('/conversation/'.$conversation->id) !!}' + "/" + document.getElementById("messageText").value;
    window.location.href=url;
  }
</script>
@endsection
