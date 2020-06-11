@extends('master.layout')
@section('title','Register')
@section('content')
    <form action="{{route('register')}}" method="post" class="col-md-6 container" role="form" style="padding-top:190px ;margin-top: 80px; height: auto;padding-bottom: 30px; float: left">
        @csrf
        <h1 class="text-center col-lg-12 col-md-5">{{__('Register')}}</h1>
        <div class="form-group row">
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2">{{__('Full name')}}: </label>
            </div>
            <div class="col-xs-9 col-md-8">
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @if($errors->any())
                    @foreach($errors->get('name') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2">Email: </label>
            </div>
            <div class="col-xs-9 col-md-8">
                <input type="text" class="form-control" name="email" value="{{old('email')}}">
                @if($errors->any())
                    @foreach($errors->get('email') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2">{{__('Password')}}: </label>
            </div>
            <div class="col-xs-3 col-md-8">
                <input type="password" class="form-control mb-1" name="password" id="password">
                @if($errors->any())
                    @foreach($errors->get('password') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}<br></i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2" style="width: max-content">{{__('Confirm Password')}}: </label>
            </div>
            <div class="col-xs-6 col-md-8">
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                <span id="message"></span>
                @if($errors->any())
                    @foreach($errors->get('password_confirmation') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}<br></i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2">{{__('Address')}}: </label>
            </div>
            <div class="col-xs-9 col-md-8">
                <input type="text" class="form-control" name="address" value="{{old('address')}}">
                @if($errors->any())
                    @foreach($errors->get('address') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-3 col-md-3">
                <label for="" class="float-md-right mt-2">{{__('Phone')}}: </label>
            </div>
            <div class="col-xs-9 col-md-8">
                <input type="tel" class="form-control" name="phone" value="{{old('phone')}}">
                @if($errors->any())
                    @foreach($errors->get('phone') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-success btn-block col-md-5 container">{{__('Sign Up')}}</button>
    </form>
@endsection

@section('script')
<script>
    $('#password, #password_confirmation').on('keyup', function () {
        if ($('#password').val() == $('#password_confirmation').val()) {
            $('#message').text('{{__("Confirm Password Matching Password")}}').css('color', 'green');
        } else
            $('#message').text('{{__('Confirm Password Not Matching Password')}}').css('color', 'red');
    });
</script>
@endsection
