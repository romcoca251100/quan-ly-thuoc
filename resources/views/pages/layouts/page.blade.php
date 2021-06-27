@extends('pages.layouts.layout')
@section('content')
    <div class="container">
        <div class="mapping">
            @yield('mapping')
        </div>
        <div class="sidebar-main">
            <div class="sidebar-content">
                <section id="title-menu">
                    <h2 class="widget-title">Danh mục sản phẩm</h2>
                    <ul id="menu-items">
                        @if (isset($nhomthuoc))
                            @foreach ($nhomthuoc as $item)
                                <li class="item-menu-product"><a
                                        href="{{ route('index.getNhomThuoc', ['slug'=>$item->slug,'id' => $item->id]) }}"
                                        class="nav-item">{{ $item->ten_nhom_thuoc }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </section>
                <section id="contact-menu">
                    <h2 class="widget-title">Hỗ trợ trực tuyến</h2>
                    <img src="{{ asset('upload/images/website/support/support.gif') }}" alt="">
                    <ul id="menu-items">
                        <li class="item-menu-product"> <i class="fas fa-phone-square"></i> +84 123 456 789 </li>
                        <li class="item-menu-product"> <i class="fas fa-envelope"></i> hieuthuocutt@gmail.com </li>
                    </ul>
                </section>
            </div>
            <div class="main-content">
                @yield('content-pra')
            </div>
        </div>
    </div>
@endsection
