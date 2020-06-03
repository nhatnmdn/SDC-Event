@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                    <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                    </li>
                    <li><a href="#">Quản lí sự kiện</a>
                    </li>
                    <li class="active">Danh dách</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE STRIPED -->
                    <div class="panel-heading">
                        <h3 class="panel-title">SỰ KIỆN<a style="color:white" class="btn btn-success pull-right" href="{{ route('admin.get.create.event') }}">Thêm</a></h3>
                    </div>
                    <div class="panel" style="margin-top:30px">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sự kiện</th>
                                    <th>Hình ảnh</th>
                                    <th>Thời gian bắt đầu</th>
                                    <th>Thời gian kết thúc</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($events))
                                    @foreach($events as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <img class="reponsive" style="with: 10%; height:10%" src="{{pare_url_file($item->image)}}" value="0">
                                            </td>

                                            <td>{{$item->start_time}}</td>
                                            <td>{{$item->end_time}}</td>
                                            <td>{{$item->intro}}</td>
                                        <!-- <td>{!!$item->detail!!}</td> -->
                                            <td>
                                                <a href="{{route('admin.get.action.event',['active',$item->id])}}" class="label {{$item->getStatus($item->status)['class']}}">{{$item->getStatus($item->status)['name']}}</a>
                                            </td>
                                            <td>
                                                <a style="padding: 5px 10px; border: 1px solid #999; font-size:12px" href="{{route('admin.get.edit.event',$item->id)}}"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('admin.get.action.event',['delete',$item->id])}}" data-toggle="modal" data-target="" style="padding: 5px 10px; border: 1px solid #999; font-size:12px"><i class="fas fa-trash-alt"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE STRIPED -->
                </div>
            </div>
        </div>
    </div>

    @if(isset($events))
        @foreach($events as $item)
            @include("admin.modal.modal-del-event")
        @endforeach
    @endif
@endsection
