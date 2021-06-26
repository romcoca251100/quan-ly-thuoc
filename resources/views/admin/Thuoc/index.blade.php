@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách thuốc</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách thuốc</h1>
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
                    Thêm thuốc</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách thuốc
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên thuốc</th>
                                    <th>Nhóm thuốc</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá nhập</th>
                                    <th>Đơn giá bán</th>
                                    <th>Ghi chú</th>
                                    <th>Chức năng</th>
                            </thead>
                            <tbody>
                                @if (isset($thuoc))
                                    @php$i = 1;@endphp
                                    @foreach ($thuoc as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                            </td>
                                            <td class="" style="font-weight: 600; color: rgb(231, 38, 38)">
                                                {{ $item->ten_thuoc }}</td>
                                            <td class="" style="">
                                                @if ($item->nhom_thuoc)
                                                    {{ $item->nhom_thuoc->ten_nhom_thuoc }}
                                                @else
                                                    Không tồn tại
                                                @endif
                                            </td>
                                            <td class="" style="">{{ $item->so_luong }}</td>
                                            <td class="" style="">{{ $item->don_gia_nhap }}</td>
                                            <td class="" style="">{{ $item->don_gia_ban }}</td>
                                            <td class="" style="">{{ $item->ghi_chu }}</td>
                                            <td class="center" style="text-align: center;">
                                                <a class="btn btn-success btn-xs btn-edit" href="#"
                                                    data-url="{{ route('admin.nhomthuoc.getEdit', ['id' => $item->id]) }}"
                                                    ​><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.nhomthuoc.getDelete', ['id' => $item->id]) }}"
                                                    onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
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
@endsection

@section('script')

@endsection
