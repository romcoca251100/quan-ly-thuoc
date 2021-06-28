@extends('pages.layouts.page')
@section('head')
    <title>Tất cả sản phẩm</title>
@endsection
@section('mapping')
    <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getThuoc') }}"
            class="">Tất cả sản phẩm</a></span>

@endsection

@section('content-pra')

    <div class="page-products">
        @if (isset($thuoc))
            <div class="content-page-product">
                <ul class="row list-products">
                    @if (count($thuoc) > 0)
                        @foreach ($thuoc as $item)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('index.getThuocDetail', ['nhom_slug' => $item->nhom_thuoc->slug, 'nhom_id' => $item->nhom_thuoc->id, 'thuoc_slug' => $item->slug, 'thuoc_id' => $item->id]) }}" class="hover-img-product"><img width="300" height="225"
                                                src="{{ asset($item->hinh_anh) }}" alt=""></a>
                                        </div>
                                        <h3 class="title-product" style="margin-bottom: 15px;">
                                            <a href="{{ route('index.getThuocDetail', ['nhom_slug' => $item->nhom_thuoc->slug, 'nhom_id' => $item->nhom_thuoc->id, 'thuoc_slug' => $item->slug, 'thuoc_id' => $item->id]) }}">{{ $item->ten_thuoc }}</a>
                                            <br>
                                            (<a href="{{ route('index.getNhomThuoc', ['slug'=>$item->nhom_thuoc->slug, 'id' => $item->nhom_thuoc->id]) }}" style="font-weight: 400">{{ $item->nhom_thuoc->ten_nhom_thuoc }}</a>)
                                        </h3>
                                        <p class="price-product">
                                            {{ number_format($item->don_gia_ban) }} VNĐ
                                        </p>
                                        <div class="buy">
                                            <a style="cursor: pointer; color: white;" class="btn-buy" onclick="addCart({{ $item->id }})" data-id="{{ $item->id }}">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </li>
                        @endforeach

                    @else
                        Không có sản phẩm nào
                    @endif
                </ul>
            </div>
        @endif

        @if (isset($nhomthuoc))
            @foreach ($nhomthuoc as $item)
                <div class="title-page-product">
                    <h3><a href="{{ route('index.getNhomThuoc', ['slug'=>$item->slug, 'id' => $item->id]) }}">{{ $item->ten_nhom_thuoc }}</a>
                    </h3>
                </div>
                <div class="content-page-product">
                    <ul class="row list-products">
                        <?php $i = 1; ?>
                        @if (count($item->thuoc) > 0)
                            @foreach ($item->thuoc as $thuoc)
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
                                                (<a href="{{ route('index.getNhomThuoc', ['slug'=>$item->slug, 'id' => $item->id]) }}" style="font-weight: 400">{{ $item->ten_nhom_thuoc }}</a>)
                                            </h3>
                                            <p class="price-product">
                                                {{ number_format($thuoc->don_gia_ban) }} VNĐ
                                            </p>
                                            <div class="buy">
                                                <a style="cursor: pointer; color: white;" class="btn-buy" onclick="addCart({{ $thuoc->id }})" data-id="{{ $thuoc->id }}">Thêm vào giỏ hàng</a>
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
                    <h3 class="heading-more">
                        <a title="Xem thêm" href="{{ route('index.getNhomThuoc', ['slug'=>$item->slug, 'id' => $item->id]) }}">Xem
                            tất
                            cả...</a>
                    </h3>
                </div>
            @endforeach
        @endif
    </div>

@endsection
