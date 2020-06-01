
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Tên sự kiện:</label>
                                <input type="text" class="form-control" name="name" value="">
                                @if($errors->has('name'))
                                    <div class="error-text">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="address">Địa điểm:</label>
                                <input type="text" class="form-control" name="place" value="">
                                @if($errors->has('place'))
                                    <div class="error-text">
                                        {{$errors->first('place')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Mô tả:</label>
                                <input type="text" class="form-control" name="intro" value="">
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
                                <input type="datetime-local" class="form-control" name="time_start" value="">
                                @if($errors->has('time_start'))
                                    <div class="error-text">
                                        {{$errors->first('time_start')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="time-end">Thời gian kết thúc:</label>
                                <input type="datetime-local" class="form-control" name="time_end" value="">
                                @if($errors->has('time_end'))
                                    <div class="error-text">
                                        {{$errors->first('time_end')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="time-end">Số lượng người đăng kí</label>
                                <input type="number" class="form-control" name="max_register" value="">
                                @if($errors->has('max_register'))
                                    <div class="error-text">
                                        {{$errors->first('max_register')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="time-end">Diễn giả</label>
                                <input type="text" class="form-control" name="chairman" value="">
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
                            </div>
                        </div>

                        </div>

                    <a class="btn btn-private pull-right" href="{{ route('admin.get.list.event') }}">Hủy</a>
                    <button type="submit" class="btn btn-success pull-right" >Lưu</button>
                </form>

