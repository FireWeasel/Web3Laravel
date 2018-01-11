@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8-col-md-offset-2">
      <div class="chat-composer">
        <input id="participant-name" type="text" placeholder="Add participant...">
        <button id="btnAdd" type="button" class="btn btn-primary" onclick="addParticipant()">Add</button>
      </div>
    </div>
  </div>
  <ul id="participants-list">

  </ul>
  <div class="row">
    <div class="col-md-8-col-md-offset-2">
        <button id="btnCreate" type="button" class="btn btn-primary" onclick="createConversation()">Create</button>
    </div>
  </div>
</div>
@endsection
<script type="text/javascript">
  function addParticipant() {
    var list = document.getElementById("participants-list");
    var name = document.getElementById("participant-name");
    var node = document.createElement("LI");
    var textnode = document.createTextNode(name.value);
    node.appendChild(textnode);
    list.appendChild(node);
    name.value = "";
  }
  function createConversation() {
    var lis = document.getElementById("participants-list").getElementsByTagName("li");
    var arr = [];
    for (var i = 0; i < lis.length; i++) {
        arr[i] = lis[i].innerHTML;
    }
    var request = {
      names: arr
    };
    axios.post('{{url('/conversation/create')}}', request);
    window.location.href='{{url('/conversations')}}';
  }
</script>
