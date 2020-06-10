@extends('master.layout')
@section('title','Reset Password')
@section('content')
    <form action="{{route('password.reset')}}" class="col-md-6 container" style="padding-top:200px ;margin-top: 80px; height: 660px" method="post">
        <h1 class="text-center col-lg-12 col-md-4">{{__('Reset Password')}}</h1>
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
        <input type="hidden" name="id" value="{{$userID}}">
        <div class="form-group row">
            <div class="col-md-4">
                <label for="password" class="float-right">{{__('New password')}}: </label>
            </div>
            <div class="col-md-6">
                <input type="password" id="password" class="form-control" name="password" placeholder="{{__('Enter new Password')}}" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4">
                <label for="password_confirmation" class="float-right">{{__('Confirm password')}}: </label>
            </div>
            <div class="col-md-6">
                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="{{__('Confirm password')}}">
            </div>
        </div>
        <button type="submit" style="margin-right: 130px" class="float-right btn btn-success">{{__('Update')}}</button>
    </form>
@endsection
