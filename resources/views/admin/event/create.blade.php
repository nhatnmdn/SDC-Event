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

                @include("admin.event.form")
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
