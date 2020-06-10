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
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2">Email: </label>
            </div>
            <div class="col-md-7">
                <input type="text" id="email" class="form-control" name="email"
                       placeholder="Enter email to retrieve your password." autofocus>
            </div>
            <div class="col-md-10">
            <button type="submit" style="margin-top:10px " class="col-md-4 float-md-right btn btn-success btn-block">Send Mail</button>
            </div>
        </div>
    </form>
@endsection
