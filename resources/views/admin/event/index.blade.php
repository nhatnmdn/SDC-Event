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
                    <div class="row">
                        <form action="{{route('admin.get.list.event')}}" method="get" id="placeSearchForm">
                            <div class="col-md-3">
                                <input type="hidden" name="searchBy" value="place">
                                <select name="search" class="form-control placeOption">
                                    <option> Địa điểm</option>
                                    @foreach($listEvent as $item)
                                        <option value="{{$item->place}}">{{$item->place}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                        <form action="{{route('admin.get.list.event')}}" method="get">
                            <div class="input-group col-md-3" style="float: left">
                                <input type="text" class="form-control" name="search" value="{{request()->query('search')}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-info" type="submit" style="float: right"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2" style=" float: left">
                                <div class="col-3">
                                    <input type="radio" name="searchBy" id="name" value="name" {{request()->query('searchBy') == 'name' ? 'checked' : ''}}>
                                    <label for="name">Tên sự kiện</label>
                                </div>
                                <div class="input-group col-3">
                                    <input type="radio" name="searchBy" id="intro" value="intro" {{request()->query('searchBy') == 'intro' ? 'checked' : ''}}>
                                    <label for="intro">Mô tả</label>
                                </div>
                            </div>
                        </form>
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
                                    <th>Địa điểm</th>
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
                                            <td>{{$item->place}}</td>
                                            @if($item->status == 0)
                                                <td><a href="{{ route('cancel_event',$item->id) }}" class="label label-danger">Hủy</a></td>
                                            @else
                                                <td><a class="label label-danger">Đã hủy</a></td>
                                            @endif
                                            <td>
                                                <?php
                                                $now = new DateTime("");
                                                $start = new DateTime("$item->start_time");
                                                $end = new DateTime("$item->end_time");
                                                if ($now > $end) {
                                                    echo "<span class='label label-danger'>Đã diễn ra</span>";
                                                } elseif ($now < $start) {
                                                    echo "<span class='label label-info'>Sắp diễn ra</span>";
                                                } elseif ($now > $start && $now < $end) {
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

@section('script')
    <script>
        $(document).ready(function () {
            $(".placeOption").change(function () {
                $("#placeSearchForm").submit()
            })
        })
    </script>
@endsection
