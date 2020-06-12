@extends('admin.layouts.master')
@section('title','Quản lý người dùng')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <div class="panel">
                                <div class="panel-heading custom-header-panel">
                                    <h3 class="panel-title roboto">THÔNG TIN CÁ NHÂN</h3>
                                </div>
                                <div class="panel-body">
                                    @if(isset($users))
                                        <div class="col-md-4" style="margin-top: 40px">
                                            <div class="">
                                                <img src="{{asset($users->avatar)}}" style="border-radius: 100px"
                                                     width="150" height="150">
                                            </div>
                                        </div>
                                        <div class="col-md-8" style="margin-top: 20px">
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Họ tên:</label>
                                                <div class="">
                                                    <label class="col-md-6">{{$users->name}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Email:</label>
                                                <div class="">
                                                    <label class="col-md-6">{{$users->email}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Điện thoại:</label>
                                                <div class="">
                                                    <label class="col-md-6">{{$users->phone}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Địa chỉ:</label>
                                                <div class="">
                                                    <label class="col-md-6">{{$users->address}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 col-form-label">Loại tài khoản:</label>
                                                <div class="">
                                                    <label class="col-md-6">{{$users->role->name}}</label>
                                                </div>
                                            </div>
                                            <div class="form-group pull-right">
                                                <a href="{{route('admin.get.list.user')}}" class="btn btn-primary">Trở
                                                    về</a>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </form> <!-- Fint form -->
            </div>
        </div>
    </div>



    <style>
        /* custom background for panel  */
        .container {
            padding-top: 50px !important;
            background-color: #f5f5f5 !important;
        }

        /* custom background header panel */
        .custom-header-panel {
            text-align: center;
            background-color: #00A0F0 !important;
            border-color: #00A0F0 !important;
            color: white;
        }
    </style>

@endsection()


