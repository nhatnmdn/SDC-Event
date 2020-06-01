<form class="form" action="">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nhân viên</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Chọn loại tài khoản</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>ADMIN</option>
                                <option>NHÂN VIÊN</option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Trạng thái</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>CHO PHÉP</option>
                                <option>KHÔNG CHO PHÉP</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="inputEmail4">Mật khẩu</label>
                                <input type="password" class="form-control" id="inputEmail4" placeholder="Password" name="password">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="inputPassword4">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                            </div>
                        </div>
            
                    </div>  
                    <button type="submit" class="btn btn-private pull-right">Hủy</button>
                    <button type="submit" class="btn btn-success pull-right">Lưu</button>
                </div>
</form>              