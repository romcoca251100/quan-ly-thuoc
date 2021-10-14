@extends('admin.layouts.layout')

@section('head')
    <title>Trang chủ</title>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Trang chủ</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-pied-piper-pp fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý nhóm thuốc</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.nhomthuoc.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-product-hunt fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý thuốc</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.thuoc.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-paste fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý hoá đơn bán thuốc</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.hoadonxuat.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-share-square-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý nhập thuốc</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.hoadonnhap.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý khách hàng</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.khachhang.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    @if(Auth::user()->role == 1)
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-group fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 25px">Quản lý nhân viên</div>
                        <div></div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.nhanvien.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Truy cập</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
    
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thống kê
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê tổng tiền hoá đơn xuất theo ngày</b>
                            </div>
                            <div class="panel-body">
                                <div class="chartWrapper">
                                    <div class="chartAreaWrapper">
                                        <canvas id="myChart"></canvas>
                                        <script src="{{asset('front-end/admin/js/chart.js')}}"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê số sản phẩm theo Loại sản phẩm</b>
                            </div>
                            <div class="panel-body">
                                <div class="chartWrapper">
                                    <div class="chartAreaWrapper">
                                        <canvas id="myChart2"></canvas>
                                        <script src="{{asset('front-end/admin/js/chart.js')}}"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endif

@endsection