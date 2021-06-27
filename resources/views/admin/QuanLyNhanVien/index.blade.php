@extends('admin.layouts.layout')

@section('head')
    <title>Quản lý nhân viên</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách tài khoản nhân viên</h1>
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
                <a class="btn btn-primary" href="{{ route('admin.nhanvien.getAdd') }}"> <i class="fa fa-plus"></i>
                    Thêm mới</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách tài khoản nhân viên
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Địa chỉ</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($user))
                                    @php $i = 1
                                    @endphp
                                    @foreach ($user as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                            </td>
                                            <td class="">{{ $item->nhan_vien->ho_ten }}</td>
                                            <td class="" style="">{{ $item->email }}</td>
                                            <td class="" style="">{{ $item->nhan_vien->dien_thoai }}</td>
                                            <td class="" style="">{{ date('d/m/Y', strtotime($item->nhan_vien->ngay_sinh)) }}</td>
                                            <td class="" style="">{{ $item->nhan_vien->gioi_tinh}}</td>
                                            <td class="" style="">{{ $item->nhan_vien->dia_chi}}</td>
                                            <td class="" style="">
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('admin.nhanvien.getEdit', ['id' => $item->id]) }}" ​><i
                                                        class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.nhanvien.getDelete', ['id' => $item->id]) }}" ​><i
                                                        class="fa fa-edit"></i> Xoá</a>
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