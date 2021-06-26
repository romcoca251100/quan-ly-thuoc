@extends('pages.layouts.layout')

@section('content')
    <!-- Begin: Slide -->
    <div class="slide">
        <img src="{{ asset('upload/images/website/slider/banner.png') }}" alt="Banner">
    </div>
    <!-- End: Slide -->

    <!--Begin: Product Section -->
    <div class="container">
        <h2 class="heading">
            <a title="Danh sách sản phẩm" href="">Danh sách sản phẩm</a>
        </h2>

        <div class="show-product coloum-4">
            <ul class="row list-products">
                <li class="product-item pd-list">
                    <div class="wrap-product">
                        <div class="img-product">
                            <a href="" class="hover-img-product"><img width="300" height="225" src="" alt=""></a>
                        </div>
                        <h3 class="title-product" style="margin-bottom: 15px;">
                            <a href="">Tên sản phẩm</a> 
                            <br>
                            (<a href="" style="font-weight: 500">Loại thuốc</a>)
                        </h3>
                        <p class="price-product">
                            20.000 VNĐ
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <h3 class="heading-more">
            <a title="Danh sách sản phẩm" href="">Xem tất cả...</a>
        </h3>
    </div>
    <!--Begin: End Section -->

    <div class="intro">
        <div class="container">
            <h2 class="heading">
                <a title="Danh sách sản phẩm" href="">Về chúng tôi</a>
            </h2>
            <p class="content-intro">
                Nhà thuốc UTT
                Là Nhà thuốc được Sở Y tế Hà nội chứng nhận đạt tiêu chuẩn "Thực hành tốt nhà thuốc (GPP).
                Nhà thuốc cung cấp tất cả các thuốc, đặc biệt là thuốc và các biệt dược tiên tiến, hiện đại dùng điều trị bệnh tim mạch với chất lượng tốt nhất và đúng giá quy định. Người bệnh mua thuốc được các bác sĩ, dược sĩ tư vấn tận tình, chu đáo và dễ hiểu. Tại Nhà thuốc Mạnh Cường, người bệnh có thể tìm được những loại thuốc quý hiếm nhất để điều trị bệnh tim mạch mà có thể các Nhà thuốc khác không có.
                Nếu không dung nạp thuốc, người bệnh sẽ được xem xét những loại thuốc mình đang sử dụng và nếu thuốc đó không hợp với người bệnh, Nhà thuốc sẽ nhập lại những mà thuốc người bệnh đã mua tại Nhà thuốc, tránh lãng phí cho người bệnh.
            </p>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <div class="row">
                <div class="wrap-service">
                    <figure><img src="{{ asset('upload/images/website/services/dich-vu-lap-dat.png') }}"></figure>
                    <div>
                        <h3>TIÊU CHUẨN GPP</h3>
                        <div class="desc-gt">Nhà thuốc đạt chuẩn GPP</div>
                    </div>
                </div>
                <div class="wrap-service">
                    <figure><img src="{{ asset('upload/images/website/services/dich-vu-thanh-toan.png') }}"></figure>
                    <div>
                        <h3>GIÁ TỐT NHẤT</h3>
                        <div class="desc-gt">Giá bán tốt nhất</div>
                    </div>
                </div>
                <div class="wrap-service">
                    <figure><img src="{{ asset('upload/images/website/services/dich-vu-bao-hanh.png') }}"></figure>
                    <div>
                        <h3>SỨC KHOẺ</h3>
                        <div class="desc-gt">Sức khoẻ khách hàng đặt lên hàng đầu
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
