@extends('admin.layouts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin nhân viên</h1>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif
    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('thongbao') }}
        </div>
    @endif
    

    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin nhân viên
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.nhanvien.postEdit', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ho_ten">Họ tên</label>
                    <input type="text" class="form-control" id="ho_ten" placeholder="Họ và tên" name="ho_ten" value="{{ Auth::user()->nhan_vien->ho_ten }}"
                        autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ Auth::user()->email }}"
                        autocomplete="off" disabled />
                </div>
                
                <div class="form-group">
                    <label for="dien_thoai">Điện thoại</label>
                    <input type="text" class="form-control" id="dien_thoai" placeholder="Số điện thoại" name="dien_thoai" value="{{ Auth::user()->nhan_vien->dien_thoai }}"
                        autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="ngay_sinh">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ Auth::user()->nhan_vien->ngay_sinh }}"
                        autocomplete="off" />
                </div>

                <div class="form-group" style="width: 40%;">
                    <label for="gioi_tinh">Giới tính</label>
                    <select class="form-control" name="gioi_tinh" id="gioi_tinh">
                        <option value="Nam"  >Nam</option>
                        <option value="Nữ" @if (Auth::user()->nhan_vien->gioi_tinh == "Nữ") selected @endif>Nữ</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dia_chi">Địa chỉ</label>
                    <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="{{ Auth::user()->nhan_vien->dia_chi }}"
                        placeholder="Địa chỉ" />
                </div>
                     
                <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                <button type="reset" class="btn btn-default">Nhập lại</button>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Đặt lại mật khẩu
        </div>
        <div class="panel-body">
            <form action="" method="get">
                @csrf
                <label for="exampleFormControlInput1">Đặt lại mật khẩu về mặc định là: 12345678</label>
                <br>
                <button type="submit" class="btn btn-primary mb-2" onclick="return ConfirmResetPass()">Đặt lại mật
                    khẩu</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Xác nhận mật khẩu không đúng!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;

    </script>

@endsection
