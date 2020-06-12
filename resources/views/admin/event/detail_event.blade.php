@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')

    @if(isset($detail))
        <div class="container" style="margin-top: 50px;height: auto">
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
                </div>
            </div>
            <div class="col-lg-10" style="float:left; margin: 20px 0 20px 0 ">
                {!! $detail->detail !!}
            </div>
        </div>
    @endif

@endsection()

