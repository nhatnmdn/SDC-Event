@extends('admin.layouts.master')
@section('title','Thành viên')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                    <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                    </li>
                    <li><a href="#">Thành viên</a>
                    </li>
                    <li class="active">Danh dách</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h3 class="panel-title">NHÂN VIÊN<a style="color:white" class="btn btn-success pull-right" href="{{route('admin.get.create.personel')}}">Thêm</a></h3>
                    </div>
                    <div class="panel" style="margin-top:30px">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên nhân viên</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>tổ chức vui chơi cho trẻ em</td>
                                    <td>
                                        Nguyễn Văn Đông
                                    </td>
                                    <td><a href="#" class="label label-info">Hoạt động</a></td>
                                    <td>
                                        <a style="padding: 5px 10px; border: 1px solid #999; font-size:12px" href="{{route('admin.get.edit.personel')}}"><i class="fas fa-edit"></i></a>
                                        <a style="padding: 5px 10px; border: 1px solid #999; font-size:12px" href="" data-toggle="modal" data-target="#myModal"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE STRIPED -->
                </div>
            </div>
        </div>
    </div>

    @include("admin.modal.modal-del-personel")




@endsection
