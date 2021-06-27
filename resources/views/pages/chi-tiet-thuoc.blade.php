@extends('pages.layouts.page')
@section('head')
    <title>{{ $thuoc->ten_thuoc }}</title>
@endsection
@section('mapping')
    <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getThuoc') }}"
        class="">Tất cả sản phẩm</a></span> /
    @if (isset($thuoc))
        <span><a href="{{ route('index.getNhomThuoc', ['slug'=>$thuoc->nhom_thuoc->slug, 'id' => $thuoc->nhom_thuoc->id]) }}"
                class="">{{ $thuoc->nhom_thuoc->ten_nhom_thuoc }}</a></span> /
        <span><a href="{{ route('index.getThuocDetail', ['nhom_slug' => $thuoc->nhom_thuoc->slug, 'nhom_id' => $thuoc->nhom_thuoc->id, 'thuoc_slug' => $thuoc->slug, 'thuoc_id' => $thuoc->id]) }}" class="">{{ $thuoc->ten_thuoc }}</a></span>
    @endif
@endsection

@section('content-pra')

    @if (isset($thuoc))
        <div class="content-product">
            <div class="content-img-product">
                <img src="{{ asset($thuoc->hinh_anh) }}" alt="{{ $thuoc->ten_thuoc }}">
            </div>
            <div class="content-info-product">
                <h1 class="name-product">{{ $thuoc->ten_thuoc }}</h1>
                <div class="product-meta">
                    <span class="sold"><i>Đã bán: {{ $thuoc->da_ban }}</i></span>
                    <span class="posted_in">Danh mục: <a
                            href="{{ route('index.getNhomThuoc', ['slug'=>$thuoc->nhom_thuoc->slug, 'id' => $thuoc->nhom_thuoc->id]) }}"
                            class="">{{ $thuoc->nhom_thuoc->ten_nhom_thuoc }}</a></span>
                </div>
                <div class="price">
                    <span><i>Giá:</i></span>
                    <p class="price-product">
                        <font size="4">
                                {{ number_format($thuoc->don_gia_ban) }} VNĐ
                        </font>
                    </p>
                    <div class="buy-share">
                        <div class="buy">
                            <a href="" class="btn-buy" data-toggle="modal" data-target="#fomr-lh">Thêm vào giỏ hàng</a>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>


        <div class="detail-product">
            <div class="title-detail">
                <h3>GHI CHÚ</h3>
            </div>
            <div class="content-detail">
                {!! $thuoc->ghi_chu !!}
            </div>
        </div>
    @endif
    <div class="orther-products">
        <div class="title-orther">
            <h3>SẢN PHẨM LIÊN QUAN</h3>
        </div>
        <div class="content-orther-product">
            <ul class="row list-products">
                <?php $i = 1; ?>
                @foreach ($thuoc->nhom_thuoc->thuoc as $item)
                    @if ($item->id != $thuoc->id)
                            @if ($i < 4)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('index.getThuocDetail', ['nhom_slug' => $item->nhom_thuoc->slug, 'nhom_id' => $item->nhom_thuoc->id, 'thuoc_slug' => $item->slug, 'thuoc_id' => $item->id]) }}"
                                                class="hover-img-product"><img width="300" height="225"
                                                    src="{{ asset($item->hinh_anh) }}"
                                                    alt="product-1"></a>
                                        </div>
                                        <h3 class="title-product">
                                            <a href="{{ route('index.getThuocDetail', ['nhom_slug' => $item->nhom_thuoc->slug, 'nhom_id' => $item->nhom_thuoc->id, 'thuoc_slug' => $item->slug, 'thuoc_id' => $item->id]) }}">{{ $item->ten_thuoc }}</a>
                                            <br>
                                            (<a href="{{ route('index.getNhomThuoc', ['slug'=>$item->slug, 'id' => $item->id]) }}" style="font-weight: 400">{{ $item->nhom_thuoc->ten_nhom_thuoc }}</a>)
                                        </h3>
                                        <p class="price-product">
                                            {{ number_format($item->don_gia_ban) }} VNĐ
                                        </p>
                                        <div class="buy">
                                            <a href="" class="btn-buy" data-toggle="modal" data-target="#fomr-lh">Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            <?php $i++; ?>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

@endsection
