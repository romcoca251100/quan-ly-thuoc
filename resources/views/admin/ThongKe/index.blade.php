@extends('admin.layouts.layout')

@section('head')
    <title>Thống kê</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thống kê</h1>
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
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Thống kê số lượng sản phẩm theo Loại sản phẩm</b>
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
@endsection