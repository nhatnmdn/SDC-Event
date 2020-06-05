@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                    <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                    </li>
                    <li><a href="{{ route('admin.get.list.event') }}">Quản lý sự kiện</a>
                    </li>
                    <li class="active">Danh dách</li>
                </ol>
            </div>
            <div>

                @if(Session::has('noti'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('noti')}}
                    </div>
                @endif


                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Tên sự kiện:</label>
                                <input type="text" class="form-control" name="name" value="{{old('name',isset($event->name) ? $event->name : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="address">Địa điểm:</label>
                                <input type="text" class="form-control" name="place" value="{{old('place',isset($event->place) ? $event->place : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="title">Mô tả:</label>
                                <input type="text" class="form-control" name="intro" value="{{old('place',isset($event->intro) ? $event->intro : '')}}">

                            </div>

                            <div class="form-group">
                                <label for="detail">Nội dung:</label>
                                <textarea name="detail" id="e_content" cols="30" rows="10" >{{old('detail',isset($event->detail) ? $event->detail : '')}}</textarea>

                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="time-start">Thời gian bắt đầu:</label>
                                <input type="datetime" class="form-control" name="time_start" value="{{old('time_start',isset($event->start_time) ? $event->start_time : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="time-end">Thời gian kết thúc:</label>
                                <input type="datetime" class="form-control" name="time_end" value="{{old('time_end',isset($event->end_time) ? $event->end_time : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="time-end">Số lượng người đăng kí</label>
                                <input type="number" class="form-control" name="max_register" value="{{old('max_register',isset($event->max_register) ? $event->max_register : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="time-end">Diễn giả</label>
                                <input type="text" class="form-control" name="chairman" value="{{old('chairman',isset($event->chairman) ? $event->chairman : '')}}">

                            </div>
                            <div class="form-group">
                                <label for="imgage">Ảnh bìa:</label>
                                <input type="file" id="img" name="avatar" onchange="changeImg(this)" >
                                <img id="avatar" style="height: auto; width:100%;" src=" {{pare_url_file($event->image)}}">
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-private pull-right">Hủy</button>
                    <button type="submit" class="btn btn-success pull-right">Lưu</button>
                </form>


            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('e_content');
    </script>
    <script type="text/javascript">
        function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
    </script>
@stop
