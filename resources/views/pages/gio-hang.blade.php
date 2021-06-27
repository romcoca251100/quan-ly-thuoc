@extends('pages.layouts.layout')

@section('head')
    <title>Giỏ hàng</title>
@endsection
@section('mapping-layout')
    <div class="container">
        <div class="mapping">
            <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getCart') }}" class="">Giỏ
                    hàng</a></span>
        </div>
    </div>
@endsection
@section('content')

    <div class="container-fluid ml-5 mr-5 mt-5 mb-5">
        <div class="row">
            <div class="col-10">
                danh sách
            </div>
            <div class="col-2">
                thanh toán
            </div>
        </div>
    </div>
@endsection
