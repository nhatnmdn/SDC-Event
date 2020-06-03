
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
                <input type="text" class="form-control" name="intro" value="{{old('place',isset($event->place) ? $event->place : '')}}">
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
                <input type="datetime-local" class="form-control" name="time_start" value="{{old('time_start',isset($event->time_start) ? $event->time_start : '')}}">
                @if($errors->has('time_start'))
                    <div class="error-text">
                        {{$errors->first('time_start')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="time-end">Thời gian kết thúc:</label>
                <input type="datetime-local" class="form-control" name="time_end" value="{{old('time_end',isset($event->time_end) ? $event->time_end : '')}}">
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
                <img id="avatar" style="height: auto; width:100%;" src="{{ asset('assets/img/button-click.jpg') }}">
                @if($errors->has('avatar'))
                    <div class="error-text">
                        {{$errors->first('avatar')}}
                    </div>
                @endif
            </div>
        </div>

    </div>

    <button type="submit" class="btn btn-private pull-right">Hủy</button>
    <button type="submit" class="btn btn-success pull-right">Lưu</button>
</form>

