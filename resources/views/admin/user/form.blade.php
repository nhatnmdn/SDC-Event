<form class="form" action="{{route('admin.register')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Nhân viên</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name',isset($user->name) ? $user->name : '')}}">
                @if($errors->any())
                    @foreach($errors->get('name') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" name="email" value="{{old('email',isset($user->email) ? $user->email : '')}}">
                @if($errors->any())
                    @foreach($errors->get('email') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="name">Điện thoại</label>
                <input type="tel" class="form-control" name="phone" value="{{old('phone',isset($user->phone) ? $user->phone : '')}}">
                @if($errors->any())
                    @foreach($errors->get('phone') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="{{old('address',isset($user->address) ? $user->address : '')}}">
                @if($errors->any())
                    @foreach($errors->get('address') as $messages)
                        <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}</i>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Chọn loại tài khoản</label>
                <select name="role_id" class="form-control" id="exampleFormControlSelect1">
                    @foreach($roles as $role)
                        <option
                            value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="inputEmail4">Mật khẩu</label>
                    <input type="password" class="form-control mb-1" name="password" id="password">
                    @if($errors->any())
                        @foreach($errors->get('password') as $messages)
                            <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}<br></i>
                        @endforeach
                    @endif
                </div>
                <div class="form-group col-sm-6">
                    <label for="inputPassword4">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    <span id="message"></span>
                    @if($errors->any())
                        @foreach($errors->get('password_confirmation') as $messages)
                            <i style="color: red; font-size: 90%; font-family: sans-serif">*{{$messages}}<br></i>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
        <a href="{{route('admin.get.list.user')}}" class="btn btn-private pull-right">Hủy</a>
        <button type="submit" class="btn btn-success pull-right">Lưu</button>
    </div>
</form>

@section('script')
    <script>
        $('#password, #password_confirmation').on('keyup', function () {
            if ($('#password').val() == $('#password_confirmation').val()) {
                $('#message').text('{{__("Confirm Password Matching Password")}}').css('color', 'green');
            } else
                $('#message').text('{{__('Confirm Password Not Matching Password')}}').css('color', 'red');
        });

    </script>
@endsection
