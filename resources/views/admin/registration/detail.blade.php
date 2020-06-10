@extends('admin.layouts.master')
@section('title','Chi tiet đăng kí')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                    <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                    </li>
                    <li><a href="{{route('admin.get.list.registration')}}">Danh sách đăng kí</a>
                    </li>
                    <li class="active">Danh dách</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE STRIPED -->
                    <div class="row">
                        <div class="col-lg-6" style="float:left;">
                            <img src="{{pare_url_file($registration->events->first()->image)}}" class="img-fluid" style="width: 600px; height: 400px">
                        </div>
                        <div class="col-lg-6 " style="float: left">
                            <h2 class="portfolio-title">{{$registration->events->first()->name}}</h2>
                            <p><strong>Diễn giả</strong>: {{$registration->events->first()->chairman}} </p>
                            <p><strong>Bắt đầu</strong>: {{$registration->events->first()->start_time}}</p>
                            <p><strong>Kết thúc</strong>: {{$registration->events->first()->end_time}}</p>
                            <p><strong>Địa điểm</strong>: {{$registration->events->first()->place}}</p>
                        </div>
                    </div>
                    <div class="container" style="float:left; margin: 20px 0 20px 0 ">
                        {!! $registration->events->first()->detail !!}
                    </div>
                    <!-- END TABLE STRIPED -->
                </div>
            </div>
        </div>
    </div>

@endsection
