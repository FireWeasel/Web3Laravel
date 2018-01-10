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
                <div class="form-group">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Change information</button>
                    </div>
                        {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['profile.delete', Auth::user()->id]
                          ]) !!}
                        {!! Form::submit('Delete account', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                        <!--Modal-->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit information:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model(Auth::user(), [
                                    'method' => 'PATCH',
                                    'route' => ['profile.update', Auth::user()->id],
                                    'enctype'=> 'multipart/form-data',
                                    'files' => true
])                                      !!}
                                    <img src="/public/img/{{Auth::user()->avatar}}" width="100px" height="100px" style="border-radius: 50%; /*vertical-align: middle;*/">
                                    <input type="file" name="image" class="form-control" id="avatar">
                                    <hr>
                                    Name:
                                    <input type="text" class="form-control" name="name" id="changedName" value="{{Auth::user()->name}}"><br>
                                    Age:
                                    <input type="text" class="form-control" name="age" id="changedAge" value="{{Auth::user()->age}}"><br>
                                    <label for="gender">Gender:</label>
                                    <select name="gender" class="">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="unicorn">Undefined</option>
                                    </select>
                                    <hr>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--Modal-->
                    <div class="modal fade" id="addImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit picture:</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                   {{-- {!! Form::model(Auth::user(), [--}}
                                    {{--'method' => 'PATCH',--}}
                                    {{--'route' => ['', Auth::user()->id]])--}}
                                          {{--!!}--}}
                                    <img src="/public/img/{{Auth::user()->avatar}}" width="100px" height="100px" style="border-radius: 50%; /*vertical-align: middle;*/">
                                    <input type="file" name="image" class="form-control" id="avatar">
                                    <hr>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>

                    </div>
            </div>
        </div>
    </div>
</div>

    <script>
        function pixelate(image) {
            image.src = "/public/img/boy.png";
        }
    </script>
@endsection
