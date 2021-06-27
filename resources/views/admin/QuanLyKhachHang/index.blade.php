@extends('admin.layouts.layout')

@section('head')
    <title>Quản lý khách hàng</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách tài khoản khách hàng</h1>
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
                    Danh sách tài khoản khách hàng
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
                                    <th>Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($user))
                                    @php $i = 1;
                                    @endphp
                                    @foreach ($user as $item)
                                        @if($item->khach_hang)
                                            <tr class="odd gradeX">
                                                <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                                </td>
                                                <td class="">{{ $item->khach_hang->ho_ten }}</td>
                                                <td class="" style="">{{ $item->email }}</td>
                                                <td class="" style="">{{ $item->khach_hang->dien_thoai }}</td>
                                                <td class="" style="">
                                                    {{ date('d/m/Y', strtotime($item->khach_hang->ngay_sinh)) }}</td>
                                                    <td class="" style="">{{ $item->khach_hang->dia_chi }}</td>
                                            </tr>
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
@endsection
