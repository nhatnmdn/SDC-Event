@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div>
            <div class="panel-heading">
                <h3 class="panel-title">THAY ĐỔI THÔNG TIN SỰ KIỆN</h3>
            </div>
        <form class="form" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Tên sự kiện:</label>
                            <input type="text" class="form-control" name="name" value="{{old('name',isset($event->name) ? $event->name : '')}}">
                            @if($errors->has('name'))
                                <div class="error-text">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="address">Địa điểm:</label>
                            <input type="text" class="form-control" name="place" value="{{old('place',isset($event->place) ? $event->place : '')}}">
                            @if($errors->has('place'))
                                <div class="error-text">
                                    {{$errors->first('place')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Mô tả:</label>
                            <input type="text" class="form-control" name="intro" value="{{old('place',isset($event->intro) ? $event->intro : '')}}">
                            @if($errors->has('intro'))
                                <div class="error-text">
                                    {{$errors->first('intro')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="detail">Nội dung:</label>
                            <textarea name="detail" id="e_content" cols="30" rows="10" >{{old('detail',isset($event->detail) ? $event->detail : '')}}</textarea>
                            @if($errors->has('detail'))
                                <div class="error-text">
                                    {{$errors->first('detail')}}
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="time-start">Thời gian bắt đầu:</label>
                            <input type="datetime" class="form-control" name="time_start" value="{{old('time_start',isset($event->start_time) ? $event->start_time : '')}}">
                            @if($errors->has('time_start'))
                                <div class="error-text">
                                    {{$errors->first('time_start')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="time-end">Thời gian kết thúc:</label>
                            <input type="datetime" class="form-control" name="time_end" value="{{old('time_end',isset($event->end_time) ? $event->end_time : '')}}">
                            @if($errors->has('time_end'))
                                <div class="error-text">
                                    {{$errors->first('time_end')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="time-end">Số lượng người đăng kí</label>
                            <input type="number" class="form-control" name="max_register" value="{{old('max_register',isset($event->max_register) ? $event->max_register : '')}}">
                            @if($errors->has('max_register'))
                                <div class="error-text">
                                    {{$errors->first('max_register')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="time-end">Diễn giả</label>
                            <input type="text" class="form-control" name="chairman" value="{{old('chairman',isset($event->chairman) ? $event->chairman : '')}}">
                            @if($errors->has('chairman'))
                                <div class="error-text">
                                    {{$errors->first('chairman')}}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                                <label for="imgage">Ảnh bìa:</label>
                                <input type="file" id="img" name="avatar" onchange="changeImg(this)" >
                                <img id="avatar" style="height: auto; width:100%;" src="{{pare_url_file($event->image)}}">
                        </div>
                    </div>

                    </div>

                    <a class="btn btn-private pull-right" href="{{ route('admin.get.list.event') }}">Hủy</a>
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
