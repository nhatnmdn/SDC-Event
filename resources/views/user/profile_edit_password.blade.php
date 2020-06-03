@extends('master.layout')
@section('title','ChangePassword')
@section('content')
    <form class="col-md-6 container" style="padding-top:100px ;margin-top: 80px; height: 660px" action="{{route('update.password')}}" method="post">
        @method('PUT')
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
        <h1 class="text-center container">Change Password</h1>
        <div class="row form-group">
            <div class="col-md-4">
                <label for="password" class="float-right">Current password: </label>
            </div>
            <div class="col-md-6">
                <input type="password" class="form-control mb-1" name="current_password" placeholder="Enter current Password">
                @if($errors->any())
                    @foreach($errors->get('current_password') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}
                            <br></i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="password" class="float-right">New password: </label>
            </div>
            <div class="col-md-6">
                <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Enter new Password" autofocus>
                @if($errors->any())
                    @foreach($errors->get('new_password') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}
                            <br></i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="password_confirmation" class="float-right">Confirm password: </label>
            </div>
            <div class="col-md-6">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirmation Password">
                @if($errors->any())
                    @foreach($errors->get('password_confirmation') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}
                            <br></i>
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" style="margin-right: 130px" class="float-right btn btn-success">Confirm</button>
        <a href="{{url()->previous()}}" class="btn btn-info" style="margin-left: 100px;"><i class="fa fa-arrow-left mr-1"></i>Back</a>
    </form>
@endsection
