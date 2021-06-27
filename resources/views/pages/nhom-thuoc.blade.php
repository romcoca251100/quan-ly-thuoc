@extends('pages.layouts.page')
@section('head')
    <title>{{ $nhomthuoc->ten_nhom_thuoc }}</title>
@endsection
@section('mapping')
    <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getThuoc') }}"
        class="">Tất cả sản phẩm</a></span> / @if (isset($nhomthuoc))<span><a
                href="" class="">{{ $nhomthuoc->ten_nhom_thuoc }}</a></span> @endif

@endsection

@section('content-pra')

    <div class="page-products">
        @if (isset($nhomthuoc))
            <div class="title-page-product">
                <h3><a href="">{{ $nhomthuoc->ten_nhom_thuoc }}</a>
                </h3>
            </div>
            <div class="content-page-product">
                <ul class="row list-products">
                    <?php $i = 1; ?>
                    @if (count($nhomthuoc->thuoc) > 0)
                        @foreach ($nhomthuoc->thuoc as $thuoc)
                            @if ($i < 7)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('index.getThuocDetail', ['nhom_slug' => $thuoc->nhom_thuoc->slug, 'nhom_id' => $thuoc->nhom_thuoc->id, 'thuoc_slug' => $thuoc->slug, 'thuoc_id' => $thuoc->id]) }}" class="hover-img-product"><img width="300" height="225"
                                                    src="{{ asset($thuoc->hinh_anh) }}" alt=""></a>
                                        </div>
                                        <h3 class="title-product" style="margin-bottom: 15px;">
                                            <a href="{{ route('index.getThuocDetail', ['nhom_slug' => $thuoc->nhom_thuoc->slug, 'nhom_id' => $thuoc->nhom_thuoc->id, 'thuoc_slug' => $thuoc->slug, 'thuoc_id' => $thuoc->id]) }}">{{ $thuoc->ten_thuoc }}</a>
                                            <br>
                                            (<a href="{{ route('index.getNhomThuoc', ['slug'=>$nhomthuoc->slug, 'id' => $nhomthuoc->id]) }}" style="font-weight: 400">{{ $nhomthuoc->ten_nhom_thuoc }}</a>)
                                        </h3>
                                        <p class="price-product">
                                            {{ number_format($thuoc->don_gia_ban) }} VNĐ
                                        </p>
                                        <div class="buy">
                                            <a href="" class="btn-buy" data-toggle="modal" data-target="#fomr-lh">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </li>

                            @endif
                            <?php $i++; ?>
                        @endforeach
                    @else
                        Không có sản phẩm
                    @endif
                </ul>
            </div>
        @endif
    </div>

@endsection
