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
                        @if (isset($lsp))
                            @foreach ($lsp as $item)
                                <li class="item-menu-product"><a
                                        href="{{ route('getTrangLSP', ['id' => $item->id, 'slug' => $item->slug]) }}"
                                        class="nav-item">{{ $item->name }}</a></li>
                            @endforeach
                        @endif
                        <li class="item-menu-product"><a
                            href=""
                            class="nav-item">Loại 1</a></li>
                            <li class="item-menu-product"><a
                                href=""
                                class="nav-item">Loại 2</a></li>
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
