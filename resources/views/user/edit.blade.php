@extends('master.layout')
@section('title','Edit Information')
@section('content')
    <form class="col-md-6 container" style="padding-top:100px ;margin-top: 80px; height: 660px" enctype="multipart/form-data" action="{{route('profile.update')}}" method="post">
        @method('PUT')
        @csrf
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
        <h1 class="text-center container">Edit Information</h1>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="float-md-right">Name: </label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="name"
                       value="{{$user->name}}">
                @if($errors->any())
                    @foreach($errors->get('name') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="float-md-right">Email: </label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="email" readonly
                       value="{{$user->email}}">
                @if($errors->any())
                    @foreach($errors->get('email') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="float-md-right">Phone: </label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="phone"
                       value="{{$user->phone}}">
                @if($errors->any())
                    @foreach($errors->get('phone') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="float-md-right">Address: </label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="address"
                       value="{{$user->address}}">
                @if($errors->any())
                    @foreach($errors->get('address') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="" class="float-md-right">Avatar: </label>
            </div>
            <div class="col-md-8">
                <input type="file" class="form-control" name="avatar"
                       value="{{$user->avatar}}">
                @if($errors->any())
                    @foreach($errors->get('avatar') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" style="margin-right: 130px" class="float-right btn btn-success">Update</button>
        <a href="{{url()->previous()}}" class="btn btn-info" style="margin-left: 100px;"><i class="fa fa-arrow-left mr-1"></i>Back</a>
    </form>
@endsection
