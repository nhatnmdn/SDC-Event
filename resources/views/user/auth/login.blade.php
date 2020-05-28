@extends('master.layout')
@section('title','Login')
@section('content')
    <form class="col-md-6 container" style="padding-top:200px ;margin-top: 80px; height: 660px" action="{{route('login')}}" method="post">
        {{csrf_field()}}
        @if(Session::has('messages'))
            <div class="alert alert-success container text-center">{{Session::get('messages')}}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger container" role="alert">
                @foreach($errors->all() as $error)
                    <div class="text-center">
                        {{$error}}
                    </div>
                @endforeach
            </div>
        @endif
        <h1 class="text-center container col-md-4">Login</h1>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="name" class="float-right">Email: </label>
            </div>
            <div class="col-md-6">
                <input type="text" id="email" class="form-control" name="email"
                       placeholder="Email" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3">
                <label for="password" class="float-right">Password: </label>
            </div>
            <div class="col-md-6">
                <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                <a class="float-right" href="{{route('forgot.form')}}">Forgot Password</a>
                <a class="float-left" href="{{route('register.form')}}">Register</a><br>
            </div>
        </div>
        <div class="container">
            <button type="submit" style="width: 100px;margin-right: 190px; float: right" class="btn btn-success container">Login</button>
        </div>
    </form>
@endsection
