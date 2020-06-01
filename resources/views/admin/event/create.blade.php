@extends('admin.layouts.master')
@section('title','Quản lý sự kiện')
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div>
        @if(Session::has('success'))
            <p class="alert alert-success" role="alert" style="position: fixed;right: 20px">
                {{Session::get('success')}}
            </p>
        @endif
            <div class="panel-heading">
                <h3 class="panel-title">THÔNG TIN SỰ KIỆN</h3>
            </div>
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
