@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách nhóm thuốc</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách hoá đơn bán thuốc</h1>
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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách hoá đơn bán thuốc
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hoá đơn</th>
                                    <th>Họ tên khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($hoadonxuat))
                                    <?php $i = 1;
                                   ?>
                                    @foreach ($hoadonxuat as $item)
                                        @if (isset($item->khach_hang))
                                            <tr class="odd gradeX">
                                                <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                                </td>
                                                <td style="text-align: center; color: red"> <b> DH{{ $item->id }}</b></td>
                                                <td>{{ $item->khach_hang->ho_ten }}</td>
                                                <td>{{ number_format($item->tong_tien) }} VNĐ</td>
                                                <td>{{ date('d-m-Y H:m:s', strtotime($item->ngay_lap)) }}</td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        Chưa xác nhận | <a class="btn btn-success btn-xs"
                                                        href="{{route('admin.hoadonxuat.acceptOrder', ['id' => $item->id])}}"><i class="fa fa-check"></i> Xác nhận</a>
                                                    @elseif($item->status == 1)
                                                        Đã xác nhận | <a class="btn btn-success btn-xs"
                                                        href="{{route('admin.hoadonxuat.startShip', ['id' => $item->id])}}"><i class="fas fa-shipping-fast"></i> Bắt đầu giao hàng</a>
                                                    @elseif($item->status == 2)
                                                        Đã giao hàng | 
                                                        <a class="btn btn-danger btn-xs" href="{{route('admin.hoadonxuat.cancelShip', ['id' => $item->id])}}"><i class="fa fa-close"></i> Giao hàng không thành công</a> | 
                                                        <a class="btn btn-success btn-xs" href="{{route('admin.hoadonxuat.acceptPayment', ['id' => $item->id])}}"><i class="fa fa-check-circle"></i> Xác nhận thanh toán</a>
                                                    @elseif($item->status == 3)
                                                        <b style="color: green;">ĐÃ THANH TOÁN</b>
                                                    @elseif($item->status == -1)
                                                        <b style="color: red;">ĐƠN HÀNG ĐÃ BỊ HUỶ</b>
                                                    @elseif($item->status == -2)
                                                        <b style="color: red;">GIAO HÀNG KHÔNG THÀNH CÔNG</b> | <a class="btn btn-success btn-xs"
                                                        href="{{route('admin.hoadonxuat.startShip', ['id' => $item->id])}}"><i class="fa fa-sign-out"></i> Giao lại</a> | <a class="btn btn-danger btn-xs"
                                                        href="{{route('admin.hoadonxuat.AdmincancelOrder', ['id' => $item->id])}}"><i class="fa fa-ban"></i> Huỷ</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-xs btn-view" href="#"
                                                    data-url="{{ route('admin.hoadonxuat.getView', ['id' => $item->id]) }}"
                                                    ​><i class="fa fa-edit"></i> Xem chi tiết</a>
                                                    <a class="btn btn-success btn-xs"
                                                        href="{{ route('admin.hoadonxuat.print', ['id' => $item->id]) }}"><i class="fa fa-print"></i> In hoá đơn</a>
                                                </td>
                                            </>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @include('admin.BanThuoc.modal_view')

@endsection

@section('script')

    <script>
        $('.btn-view').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-view').modal('show');
            e.preventDefault();
            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function(response) {
                    data = response.data
                    $('.hoa_don_id').text(data.id);
                    $('#ngay_dat').text(data.ngay_lap);
                    $('#khach_hang').text(data.khach_hang.ho_ten);
                    $('#table-body').html('');
                    totalPrice = 0;
                    data.chi_tiet_hdx.forEach((element, index) => {
                        if (element.thuoc != null) {
                            html = `
                                <tr>
                                    <td>${index+1}</td>
                                    <td>${element.thuoc.ten_thuoc}</td>
                                    <td>${element.so_luong}</td>
                                    <td>${element.don_gia} VNĐ</td>
                                    <td>${element.thanh_tien} VNĐ</td>
                                </tr>
                            `
                        } else {
                            html = `
                                <tr>
                                    <td>${index+1}</td>
                                    <td>Thuốc đã bị xoá</td>
                                    <td>${element.so_luong}</td>
                                    <td>${element.don_gia} VNĐ</td>
                                    <td>${element.thanh_tien} VNĐ</td>
                                </tr>
                            `
                        }
                        $('#table-body').append(html);
                            totalPrice += element.thanh_tien
                    });
                    
                    $('#tong_tien').text(totalPrice + ' VNĐ');
                    
                    
                    
                },
                error: function(error) {
                    alert("Lỗi lấy dữ liệu!")
                }
            })
        })
    </script>

@endsection
