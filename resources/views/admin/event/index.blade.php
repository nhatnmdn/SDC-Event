@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable" role="alert" style="width: 20%;">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{session_unset()}}
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- TABLE STRIPED -->
                <div class="panel-heading">
                        <h3 class="panel-title">SỰ KIỆN<a style="color:white" class="btn btn-success pull-right" href="{{ route('admin.get.create.event') }}">Thêm</a></h3>
                </div>
                <div class="panel form" style="margin-top:30px">
                    <div class="row pull-right">
                        <div class="col-sm-12">
                            <form class="form-inline" action="" style="margin-bottom:20px">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tên sự kiện..." name="e_name" value="{{\Request::get('e_name')}}">
                                </div>
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 150px;text-align: justify">Tên sự kiện</th>
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
                                        <a data-toggle="modal" data-target="#myModal" style="padding: 5px 10px; border: 1px solid #999; font-size:12px"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="" style="float: right">
                    {{ $events->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@include("admin.modal.modal-del-event")

<script>
    $("div.alert").delay(3000).slideUp();
</script>


@endsection
