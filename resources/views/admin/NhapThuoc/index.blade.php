@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách hoá đơn nhập</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách hoá đơn nhập thuốc</h1>
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
            <p>
                <a class="btn btn-primary" href="{{ route('admin.hoadonnhap.getAdd') }}"> <i class="fa fa-plus"></i>
                    Thêm mới</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách hoá đơn nhập thuốc
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">STT</th>
                                    <th style="text-align: center;">Mã hoá đơn</th>
                                    <th style="text-align: center;">Người lập</th>
                                    <th style="text-align: center;">Ngày lập</th>
                                    <th style="text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($hoadonnhap))
                                    <?php $i = 1; ?>
                                    @foreach ($hoadonnhap as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                            </td>
                                            <td class="" style="font-weight: 600; color: rgb(231, 38, 38); text-align: center;">
                                                HDN{{ $item->id }}</td>
                                            <td class="" style="text-align: center;">{{ $item->nhan_vien->ho_ten }}</td>
                                            <td class="" style="text-align: center;">{{ date('d/m/Y', strtotime($item->ngay_lap)) }}</td>
                                            <td class="center" style="text-align: center;">
                                                <a class="btn btn-primary btn-xs btn-view" href="#"
                                                    data-url="{{ route('admin.hoadonnhap.getView', ['id' => $item->id]) }}"
                                                    ​><i class="fa fa-edit"></i> Xem chi tiết</a>
                                                <a class="btn btn-success btn-xs"
                                                    href="{{ route('admin.hoadonnhap.print', ['id' => $item->id]) }}"><i class="fa fa-print"></i> In hoá đơn</a>
                                            </td>
                                        </tr>
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
    @include('admin.NhapThuoc.modal_view')

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
                    $('#ngay_lap').text(data.ngay_lap);
                    $('#nhan_vien').text(data.nhan_vien.ho_ten);
                    $('#table-body').html('');
                    totalPrice = 0;
                    data.chi_tiet_hdn.forEach((element, index) => {
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
