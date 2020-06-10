@extends('admin.layouts.master')
@section('title','Danh sách đăng kí')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                    <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                    </li>
                    <li><a href="#">Danh sách đăng kí</a>
                    </li>
                    <li class="active">Danh dách</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- TABLE STRIPED -->
                    <div class="panel-heading">
                        <h3 class="panel-title">DANH SÁCH ĐĂNG KÍ</h3>
                    </div>
                    <div class="panel" style="margin-top:30px">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sự kiện</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên người đăng kí</th>
                                    <th>Ngày đăng</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lists as $key => $item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$item->events->first()->name}}</td>
                                        <td><img style="with:30px; height:30px" src="{{pare_url_file($item->events->first()->image)}}"></td>
                                        <td>{{$item->users->first()->name}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td><a href="#" class="label label-success">{{$item->status}}</a></td>
                                        <td>
                                            <a class="label label-info" href="{{route('admin.detail.registration',$item->id)}}">Chi tiết</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                {{$lists->links()}}
                    <!-- END TABLE STRIPED -->
                </div>
            </div>
        </div>
    </div>
@endsection
