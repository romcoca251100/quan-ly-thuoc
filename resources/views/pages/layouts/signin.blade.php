@extends('pages.layouts.page')

@section('head')
    <title>Đăng nhập</title>
@endsection

@section('style')
<style>
    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
</style>
@endsection
@section('content-pra')
@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $item)
        {{$item}}
        <br>
    @endforeach
</div>
@endif
@if (session('thongbao'))
<div class="alert alert-danger">
        {{session('thongbao')}}
</div>
@endif
@if (session('thongbao2'))
<div class="alert alert-success">
    {{session('thongbao2')}}
</div>
@endif
    <div class="row">
       
        <div class="col-6">
           
            <h2 class="ml-3">Đăng nhập</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('index.postUserLogin') }}" method="POST" id="dang-nhap">
                        @csrf
                        
                        <div class="form-group">
                            <label for="email">Tài khoản</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                                placeholder="Nhập tài khoản...">
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="checkbox ml-3">
                            <label>
                                <input name="remember" type="checkbox" value=""> Ghi nhớ đăng nhập lần sau
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success ml-3">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            <h2 class="ml-3">Đăng Kí</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('index.postUserRegister') }}" method="POST" id="dang-ky">
                        @csrf
      
                        <div class="form-group">
                            <label for="ho_ten_dk">Họ tên <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="ho_ten" id="ho_ten_dk" 
                                placeholder="Nhập họ tên...">
                        </div>
                        <div class="form-group">
                            <label for="email_dk">Email <span style="color: red">*</span></label>
                            <input type="email" class="form-control" name="email" id="email_dk" aria-describedby="emailHelp"
                                placeholder="Nhập tài khoản...">
                        </div>
                        <div class="form-group">
                            <label for="dien_thoai_dk">Số điện thoại <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="dien_thoai" id="dien_thoai_dk" 
                                placeholder="Nhập số điện thoại...">
                        </div>
                        <div class="form-group">
                            <label for="password_dk">Mật khẩu <span style="color: red">*</span></label>
                            <input type="password" class="form-control" id="password_dk" name="password">
                        </div>
      
                        <div class="form-group">
                            <label for="ngay_sinh_dk">Ngày sinh <span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="ngay_sinh" id="ngay_sinh_dk" 
                                placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="dia_chi_dk">Địa chỉ <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="dia_chi" id="dia_chi_dk" 
                                placeholder="Nhập địa chỉ">
                        </div>
                        <small id="emailHelp" class="form-text text-muted ml-3">Các trường có dấu (<span style="color: red">*</span>) không được để trống!</small>
                        <button type="submit" class="btn btn-primary float-right mr-4">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
