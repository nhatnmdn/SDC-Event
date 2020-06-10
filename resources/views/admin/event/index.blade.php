@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            @if(Session::has('succes'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('succes')}}
                </div>
            @endif
            @if(Session::has('noti'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('noti')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE STRIPED -->
                    <div class="panel-heading">
                        <h3 class="panel-title">SỰ KIỆN<a style="color:white" class="btn btn-success pull-right"
                                                          href="{{ route('admin.get.create.event') }}">Thêm</a></h3>
                    </div>
                    <div class="panel" style="margin-top:30px">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sự kiện</th>
                                    <th>Hình ảnh</th>
                                    <th>Bắt đầu</th>
                                    <th>Kết thúc</th>
                                    <th style="width:200px">Mô tả</th>
                                    <th>Hủy sự kiện</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($events))
                                    @foreach($events as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td style="text-align: left;width: 200px">{{$item->name}}</td>
                                            <td>
                                                <img class="reponsive" style="with:30px; height:30px"
                                                     src="{{pare_url_file($item->image)}}" value="0">
                                            </td>

                                            <td>{{$item->start_time}}</td>
                                            <td>{{$item->end_time}}</td>
                                            <td>{{$item->intro}}</td>
                                            <td><a class="label label-danger">Hủy</a></td>
                                            <td>
                                                <?php
                                                $now = new DateTime("");
                                                $start = new DateTime("$item->start_time");
                                                $end = new DateTime("$item->end_time");
                                                if ($now > $end) {
                                                    echo "<span class='label label-danger'>Đã diễn ra</span>";
                                                } else
                                                    if ($now < $start) {
                                                        echo "<span class='label label-info'>Sắp diễn ra</span>";
                                                    } else
                                                        if ($now > $start && $now < $end) {
                                                            echo "<span class='label label-primary'>Đang diễn ra</span>";
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                <a style="padding: 5px 10px; border: 1px solid #999; font-size:12px"
                                                   href="{{route('admin.get.edit.event',$item->id)}}"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href=""
                                                   data-toggle="modal" data-target="#myModal"
                                                   style="padding: 5px 10px; border: 1px solid #999; font-size:12px"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE STRIPED -->
                    {{$events->links()}}
                </div>
            </div>
        </div>
    </div>
    @include("admin.modal.modal-del-event")

@endsection
