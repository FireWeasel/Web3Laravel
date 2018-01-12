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
                        <button data-toggle="modal" data-target="#addConvo" class="btn btn-default">Add new conversation</button>

                        <!--Modal-->
                        <div class="modal fade" id="addConvo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add new conversation:</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>List of available users:</h4>
                                            <ul>
                                                @foreach($users as $user)
                                                    <li>{{$user->name}}</li>
                                                @endforeach
                                            </ul>
                                        <hr>
                                        <div class="chat-composer">
                                            <input id="participant-name" type="text" placeholder="Add participant...">
                                            <button id="btnAdd" type="button" class="btn btn-primary" onclick="addParticipant()">Add</button>
                                            <ul id="participants-list">

                                            </ul>
                                        </div>
                                            <button id="btnCreate" type="button" class="btn btn-primary" onclick="createConversation()">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
