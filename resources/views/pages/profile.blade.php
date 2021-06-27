@extends('pages.layouts.layout')

@section('head')
    <title>{{ Auth::user()->khach_hang->ho_ten }}</title>
@endsection
@section('mapping-layout')
    <div class="container">
        <div class="mapping">
            <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getProfile') }}"
                    class="">Thông tin tài khoản</a></span>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid mb-5">
        <div class="container">
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
        @if (session('loi'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                {{ session('loi') }}
            </div>
        @endif
        </div>
        <div class="row">
            <div class="col-2">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                        href="#list-home" role="tab" aria-controls="home">Thông tin tài khoản</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                        href="#list-profile" role="tab" aria-controls="profile">Lịch sử đặt hàng</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="#list-messages" role="tab" aria-controls="messages">Thay đổi mật khẩu</a>
                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="card">
                            <h5 class="card-header">Thông tin tài khoản</h5>
                            <div class="card-body">
                                <h5 class="card-title">Họ và tên: </h5>
                                <span class="card-text">{{ Auth::user()->khach_hang->ho_ten }}
                                </span>
                                <hr>
                                <h5 class="card-title">Email: </h5>
                                <span class="card-text">{{ Auth::user()->email }}
                                </span>
                                <hr>
                                <h5 class="card-title">Số điện thoại: </h5>
                                <span class="card-text">{{ Auth::user()->khach_hang->dien_thoai }}
                                </span>
                                <hr>
                                <h5 class="card-title">Ngày sinh: </h5>
                                <span
                                    class="card-text">{{ date('d-m-Y', strtotime(Auth::user()->khach_hang->ngay_sinh)) }}
                                </span>
                                <hr>
                                <h5 class="card-title">Địa chỉ: </h5>
                                <span class="card-text">{{ Auth::user()->khach_hang->dia_chi }}
                                </span>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                        <div class="card">
                            <h5 class="card-header">Lịch sử đặt hàng</h5>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="bg-success">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Ngày đặt</th>
                                            <th scope="col">Tổng tiền</th>
                                            <th scope="col">Trạng thái đơn hàng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($hdx))

                                            <?php $i = 1; ?>
                                            @foreach ($hdx as $item)
                                                <tr>
                                                    <th scope="row">{{ $i++ }}</th>
                                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->tong_tien }}</td>
                                                    <td>
                                                        @if ($item->status == 1)
                                                            Đã xác nhận
                                                        @elseif ($item->status == 2)
                                                            Đã thanh toán
                                                        @else
                                                            Chờ xác nhận
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                        <div class="card">
                            <h5 class="card-header">Thay đổi mật khẩu</h5>
                            <div class="card-body">
                                <form action="{{ route('index.postUserPassword') }}" method="POST">
                                  @csrf
                                    <div class="form-group">
                                        <label for="oldPassword">Mật khẩu cũ</label>
                                        <input type="password" class="form-control" id="oldPassword" name="oldPassword">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mật khẩu mới</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                      <label for="confirmPassword">Xác nhận mật khẩu mới</label>
                                      <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                  </div>
                                    <button type="submit" class="btn btn-primary">Thay đổi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
<script type="text/javascript">
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirmPassword");

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
