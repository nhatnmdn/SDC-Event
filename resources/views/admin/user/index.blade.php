@extends('admin.layouts.master')
@section('title','Quản lí người dùng')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                    <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                    </li>
                    <li><a href="#">Quản lí người dùng</a>
                    </li>
                    <li class="active">Danh dách</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading">
                        <h3 class="panel-title">NGƯỜI DÙNG</h3>
                    </div>
                    <div class="panel" style="margin-top:30px">
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nguyễn Văn Đông </td>
                                    <td>
                                        nguyenvandong@gmail.com
                                    </td>
                                    <td><a href="#" class="label label-success">Hoạt động</a></td>
                                    <td>
                                        <a class="label label-info" data-toggle="modal" data-target="#detail">Chi tiết</a>
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

    <div id="detail" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header" style="background-color:#4385F5">
                    <h4 class="modal-title white" id="exampleModalLabel" style="color:white">Thông tin người dùng
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </h4>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="detail-user col-lg-6 text-center ">
                            <img id="text" class="img-circle" src="{{asset('assets/img/mark.jpg')}}" style="width:150px;height:150px">
                            <h4>Văn Đông</h4>
                        </div>
                        <div class="detail-user col-lg-6">
                            <p><i class="fix fas fa-envelope"></i> nguyenvandong@gmail.com</p>
                            <p><i class="fix fas fa-phone-square-alt"></i> 012346788</p>
                            <p><i class="fix fas fa-map-marker-alt"></i> 41 Lê Duẩn</p>
                            <p><i class="fab fa-speakap"></i> Block</p>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


@endsection
