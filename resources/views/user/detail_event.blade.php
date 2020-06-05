@extends('master.layout')
@section('title','Edit Information')
@section('content')
    @if(isset($detail))
        <div class="container" style="margin-top: 120px;height: auto">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('warning'))
                    <div class="alert alert-warning col-lg-12" role="alert">
                        {{Session::get('warning')}}
                    </div>
                @endif
                @if(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('danger')}}
                    </div>
                @endif
            <form action="{{route('event.register',$detail->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6" style="float:left;">
                        <img src="{{pare_url_file($detail->image)}}" class="img-fluid" style="width: 500px">
                    </div>
                    <div class="col-lg-6 " style="float: left">
                        <h2 class="portfolio-title">{{$detail->name}}</h2>
                        <p><strong>Diễn giả</strong>: {{$detail->chairman}} </p>
                        <p><strong>Bắt đầu</strong>: {{$detail->start_time}}</p>
                        <p><strong>Kết thúc</strong>: {{$detail->end_time}}</p>
                        <p><strong>Địa điểm</strong>: {{$detail->place}}</p>
                        <div>
                            <button type="submit" class="btn btn-primary" style="width: max-content;height: 35px">Đăng
                                kí
                            </button>
                        </div>

                    </div>
                </div>
                <div class="container" style="float:left; margin: 20px 0 20px 0 ">
                    {!! $detail->detail !!}
                </div>
            </form>

        </div>
    @endif
@endsection
