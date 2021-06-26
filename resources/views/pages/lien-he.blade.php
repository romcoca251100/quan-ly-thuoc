@extends('pages.layouts.page')

@section('mapping')
    <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getLienHe') }}" class="">Liên
            hệ</a></span>

@endsection

@section('content-pra')

    <div class="page-products">
        <div class="title-page-product">
            <h3><a href="{{ route('index.getLienHe') }}">Liên hệ</a></h3>
        </div>
        <div class="content-page-contact">
            <div class="div-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.195550833418!2d105.79664331533172!3d20.984796994652694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1624718389754!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        <div class="row contact">
            <div class="info-contact">
                <h3>THÔNG TIN LIÊN HỆ</h3>
                <ul>
                    <li> <i style="font-weight:600; text-transform: uppercase;">Hiệu thuốc UTT</i>
                    </li>
                    <li> <i class="fas fa-map-marked-alt"></i> Địa chỉ: <span>số 54, Triều Khúc, Thanh Xuân, Hà
                            Nội</span>
                    </li>
                    <li> <i class="fas fa-phone-square"></i> Hotline: <span>+84 123 456 789</span>
                    </li>
                    <li> <i class="fas fa-envelope"></i> Email: <span>hieuthuocutt@gmail.com</span></li>
                    <li> <i class="fas fa-globe"></i> Website: <span>hieuthuocutt.com</span></li>
                </ul>
            </div>
        </div>
    </div>

@endsection
