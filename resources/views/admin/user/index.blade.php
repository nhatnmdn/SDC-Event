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
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h3 class="panel-title">NGƯỜI DÙNG<a style="color:white" class="btn btn-success pull-right" href="{{route('admin.get.create.user')}}">Thêm</a></h3>
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
                                    @foreach($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td> {{$item->email}} </td>
                                    <td>{{$item->role->name}}</td>
                                    <td><a href="#" class="label label-success">Hoạt động</a></td>
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
    @include("admin.modal.modal-detail-user")

@endsection
