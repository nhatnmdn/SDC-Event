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
                                    <th>Người đăng kí</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Lễ ra mắt xe Vinfast</td>
                                    <td>
                                        Nguyễn Văn Đông
                                    </td>
                                    <td><a href="#" class="label label-success">Tham gia</a></td>
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


    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                ok
            </div>
        </div>
    </div>


    <div id="detail" class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#4385F5">
                    <h4 class="modal-title" id="exampleModalLabel" style="color:white">Sự kiện | LỄ RA MẮT XE VINFAST
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </h4>

                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-7">
                            <p>Bắt đầu : 20/05/2020</p>
                            <p>Kết thúc : 20/05/2020</p>
                            <p style="text-align:justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero placeat voluptates laboriosam nihil laborum at, animi maxime voluptatum dignissimos totam unde voluptatem incidunt, rerum quidem facere natus odit veniam. Temporibus incidunt odio laudantium dolor optio fugit fugiat quam repellendus nostrum. Modi, unde. Dolorum explicabo possimus non, perspiciatis placeat quo magnam architecto aspernatur nemo dicta, ipsa itaque accusantium ex corporis culpa in minima error sunt! Nostrum tenetur excepturi molestias! Delectus, aut sunt eveniet debitis ipsam perferendis tempora, praesentium labore optio repellendus ut autem itaque aliquam consequatur dolorem voluptatem magni soluta voluptates ipsa! Eius culpa, nihil ullam quisquam beatae accusamus hic asperiores quae optio alias et ratione reiciendis voluptatum quasi laborum recusandae expedita possimus eveniet illo molestiae obcaecati est perspiciatis dolores! Ut ab quaerat minus eligendi cum cupiditate, inventore rerum. Corrupti beatae quos modi explicabo a natus. Corrupti dolores accusantium voluptates ea, dolor assumenda necessitatibus consectetur maxime debitis natus ducimus, sapiente id nemo commodi. Quod eos reprehenderit illum a, minima assumenda non ipsa? Qui quod odit iusto, soluta dolorem eaque quae minima natus ipsum vel quisquam voluptatum ducimus illo illum, atque, doloremque quos voluptatibus debitis magnam numquam eveniet laboriosam quia incidunt pariatur! Inventore, aliquid. Mollitia hic vel omnis perferendis molestiae in placeat!</p>
                        </div>
                        <div class="col-lg-5">
                            <img src="{{asset('assets/img/vin.jpg')}}" style="width:100%;height:auto">
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
