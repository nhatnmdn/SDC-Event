@extends('master.layout')
@section('title','Profile')
@section('content')
    <div class="col-md-6 container" style="padding-top:100px ;margin-top: 80px; height: 660px">
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
        <h1 class="text-center container col-md-4">Profile</h1>
        <div class="container col-md-10" style=" height: 300px">
            <div class="col-md-4" style="   float: left; height: 300px">
                <div class="row container">
                    <div class="text-center">
                        <img src="{{asset($userProfile->avatar)}}" style="border-radius: 100px" width="150" height="150">
                    </div>
                    <div class="container col-md-5">
                        <label for="" class="text-center">Avatar </label>
                    </div>
                </div>
            </div>
            <div class="col-md-8" style="float: right; height: 300px">
                <div class="row">
                    <div class="col-md-3">
                        <label>Username:</label>
                    </div>
                    <div class="col-md-9 text-center">
                        <p>{{$userProfile->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Email:</label>
                    </div>
                    <div class="col-md-9 text-center">
                        <p>{{$userProfile->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Phone:</label>
                    </div>
                    <div class="col-md-9 text-center">
                        <p>{{$userProfile->phone}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Address:</label>
                    </div>
                    <div class="col-md-9 text-center">
                        <p>{{$userProfile->address}}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer row" style="background: white; border: none">
                <div class="col-md-6 mb-2">
                    <a class="btn btn-primary col-md-12" href="{{route('profile.edit.form')}}">Edit information</a>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary col-md-12" href="{{route('edit.password',['id' => $userProfile->id])}}">Change password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
