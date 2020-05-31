@extends('master.layout')
@section('title','Forgot Password')
@section('content')
    <form class="container col-md-6" style="padding-top:200px ;margin-top: 80px; height: 660px" action="{{route('send.password.mail')}}" method="post">
        {{csrf_field()}}
        @if($errors->any())
            <div class="alert alert-danger container" role="alert">
                @foreach($errors->all() as $error)
                    <div class="text-center">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        @endif
        <h1 class="text-center container">Forgot Password</h1>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="email" class="float-right">Email: </label>
            </div>
            <div class="col-md-7">
                <input type="text" id="email" class="form-control" name="email"
                       placeholder="Enter email to retrieve your password." autofocus>
            </div>
        </div>
        <button type="submit" style="margin-right: 130px" class="float-right btn btn-success">Send Mail</button>
    </form>
@endsection
