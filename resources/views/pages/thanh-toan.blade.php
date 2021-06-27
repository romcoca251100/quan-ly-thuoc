@extends('pages.layouts.layout')
@section('head')
    <title>Thanh toán</title>
@endsection

@section('content')
    <div class="container-fluid mt-5 mb-5 ml-5 mr-5">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('index.postPayment') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header" style="color: white; background: #00801c;">Thông tin khách hàng</div>
                        @if (count($errors) > 0)
                            <div class="card-body">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                @foreach ($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                        @endif
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <i>(*) Lưu ý: Thông tin khách hàng sẽ được thay đổi khi bạn sửa tại đây!</i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="ho_ten">Họ và tên:</label>
                                    <input type="text" name="ho_ten" id="ho_ten" class="form-control"
                                        value="{{ Auth::user()->khach_hang->ho_ten }}" placeholder="Điền họ và tên" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ Auth::user()->email }}" placeholder="Điền địa chỉ email" disabled />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="dien_thoai">Số điện thoại:</label>
                                    <input type="text" name="dien_thoai" id="dien_thoai" class="form-control"
                                        value="{{ Auth::user()->khach_hang->dien_thoai }}"
                                        placeholder="Điền số điện thoại" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="dia_chi">Địa chỉ:</label>
                                    <textarea type="text" name="dia_chi" id="dia_chi" class="form-control" rows="4"
                                        placeholder="Điền địa chỉ">{{ Auth::user()->khach_hang->dia_chi }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix"
                                        style="background: #00801c;">Đặt
                                        hàng </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-header" style="color: white; background: #00801c;">
                        Chi tiết đặt hàng
                        <span>
                            <a class="float-right" style="color: #fff" href="{{ route('index.getThuoc') }}">Quay lại trang
                                đặt
                                hàng</a>
                        </span>
                    </div>

                    <div class="panel-body">

                        @if (Session::has('Cart') != null)
                            @foreach (Session::get('Cart')->thuoc as $item)
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-3 col-xs-3">
                                            <img class="img-responsive" src="{{ asset($item['thuocInfo']->hinh_anh) }}"
                                                width="130px" height="80px" />
                                        </div>
                                        <div class="col-4 mt-5 ml-5 ">
                                            <div class="col-xs-12">{{ $item['thuocInfo']->ten_thuoc }}</div>
                                            <div class="col-xs-12"><small>Số lượng:
                                                    <span>{{ $item['so_luong'] }}</span></small></div>
                                        </div>
                                        <div class="col-3 text-right mt-5">
                                            <h6><span>{{ number_format($item['thuocInfo']->don_gia_ban) }}</span>
                                                VNĐ</h6>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            <div class="form-group">
                                <hr />
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng số sản phẩm:</strong>
                                    <div class="pull-right"><span>
                                            @if (isset(Session::get('Cart')->tongSoluong))
                                                {{ number_format(Session::get('Cart')->tongSoluong) }}
                                            @endif
                                        </span><span>sản phẩm</span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <hr />
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Tổng số tiền</strong>
                                    <div class="pull-right"><span>
                                            @if (isset(Session::get('Cart')->tongGia))
                                                {{ number_format(Session::get('Cart')->tongGia) }}
                                            @endif
                                        </span><span> VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
