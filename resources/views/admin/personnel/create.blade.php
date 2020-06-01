@extends('admin.layouts.master')
@section('title','Nhân viên')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <ol class="breadcrumb" style="margin-top: -57px;background: #bfb6b64a">
                <li><a href="{{ route('admin.home') }}">Trang chủ</a>
                </li>
                <li><a href="{{ route('admin.get.list.event') }}">Nhân viên</a>
                </li>
                <li class="active">Thêm mới</li>
            </ol>
        </div>
        <div>
       
        
        @include("admin.personnel.form")
          
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
