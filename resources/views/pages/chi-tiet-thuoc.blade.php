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
    {{-- <div class="orther-products">
        <div class="title-orther">
            <h3>SẢN PHẨM KHÁC</h3>
        </div>
        <div class="content-orther-product">
            <ul class="row list-products">
                <?php $i = 1; ?>
                @foreach ($sp->loaisanpham->sanpham as $item)
                    @if ($item->id != $sp->id)
                        @if ($item->hien_thi == 1)
                            @if ($i < 4)
                                <li class="product-item pd-list">
                                    <div class="wrap-product">
                                        <div class="img-product">
                                            <a href="{{ route('getSP', ['loai-san-pham' => $item->loaisanpham->slug, 'id' => $item->id, 'ten-san-pham' => $item->slug]) }}"
                                                class="hover-img-product"><img width="300" height="225"
                                                    src="{{ asset('upload/sanpham/' . $item->hinh_anh) }}"
                                                    alt="product-1"></a>
                                        </div>
                                        <h3 class="title-product">
                                            <a
                                                href="{{ route('getSP', ['loai-san-pham' => $item->loaisanpham->slug, 'id' => $item->id, 'ten-san-pham' => $item->slug]) }}">{{ $item->name }}</a>
                                        </h3>
                                        <p class="price-product">
                                            @if ($item->gia != 0)
                                                {{ number_format($item->gia) }} VNĐ
                                            @else
                                                Liên hệ
                                            @endif
                                        </p>
                                    </div>
                                </li>
                            @endif
                            <?php $i++; ?>
                        @endif
                    @endif

                @endforeach
            </ul>
        </div>
    </div> --}}

@endsection
