@extends('admin.layouts.master')
@section('title','Quản lí người dùng')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
                <div class="page-header">
                    <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                        <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                        </li>
                        <li class="active">Danh sách người dùng</li>
                    </ol>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h3 class="panel-title">DANH SÁCH NGƯỜI DÙNG<a style="color:white; float: left" class="btn btn-success pull-right" href="{{route('admin.get.create.user')}}">Thêm</a></h3>
                        <div class="row">
                        <div class="card-title col-md-12">
                            <form action="{{route('admin.get.list.user')}}" method="get">
                                <div class="input-group col-md-3" style="float: left">
                                    <input type="text" class="form-control" name="search" value="{{request()->query('search')}}" placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-info" style="float: right" type="submit"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-3" style="float: left">
                                    <div class="col-5">
                                        <input type="radio" hidden checked name="searchBy" id="name" value="name" {{request()->query('searchBy') == 'name'}}>

                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="panel" style="margin-top:30px">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Loại tài khoản</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users))
                                    @foreach($users as $key => $item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$item->name}}</td>
                                    <td> {{$item->email}} </td>
                                    <td>{{$item->role->name}}</td>
                                    <td><p class="label label-success">Hoạt động</p></td>
                                    <td>
                                        <a
                                            href="{{route('admin.detail',$item->id)}}"
                                            style="padding: 5px 10px; border: 1px solid #999; font-size:12px"><i
                                                class="fas fa-info-circle"></i></a>
                                        <a
                                            data-toggle="modal" data-target="#myModal"
                                            style="padding: 5px 10px; border: 1px solid #999; font-size:12px"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE STRIPED -->
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>

    @include("admin.modal.modal-del-user")

@endsection
