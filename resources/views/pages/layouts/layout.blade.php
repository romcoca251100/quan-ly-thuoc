<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front-end/pages/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div id="main">
        <div id="header">
            <div class="top-header">
                <div class="container">
                    <span class="contact-header">
                        <i class="fas fa-mobile-alt"></i> +84 123 456 789
                    </span>
                    <span class="contact-header">
                        <i class="far fa-envelope"></i> hieuthuocutt@gmail.com
                    </span>
                    <div class="search">
                        <div class="search-form">
                            <form action="" method="GET">
                                <label for="">
                                    <input type="search" name="input_search" id="noi-dung"
                                        placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                                </label>
                                <input type="submit" name="search" id="search"
                                    style="background-image: url({{ asset('upload/images/website/search/btnsearch.png') }})"
                                    value="Tìm kiếm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-header">
                <div class="container">
                    <div class="logo-content">
                        <div class="name-logo">
                            <a href="/"><img src="{{ asset('upload/images/website/logo/logo.png') }}"
                                    alt="Hiệu thuốc UTT" class="logo"><span id="webname">Hiệu thuốc UTT</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav" id="nav">
                <div class="container">
                    <div id="mobile-menu" class="mobile-btn-menu">
                        <i class="ti-menu"></i>
                    </div>
                    <a href="/" class="nav-item">Trang chủ</a>
                    @if (isset($nhomthuoc))
                        @foreach ($nhomthuoc as $item)
                            <a href="" class="nav-item">{{ $item->ten_nhom_thuoc }}</a>
                        @endforeach
                    @endif

                    <a href="{{ route('index.getLienHe') }}" class="nav-item">Liên hệ</a>
                    <a href="{{ route('index.getGioiThieu') }}" class="nav-item">Giới thiệu</a>
                </div>
            </div>
        </div>
        <!-- Begin: Content -->
        <div id="content">
            @yield('content')
        </div>
        <!-- End: Content -->

        <div id="footer">
            <div class="container">
                <div class="footer__content">
                    <div class="content-ft">
                        <h4>THÔNG TIN LIÊN HỆ</h4>
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
                    <div class="content-ft">
                        <h4>HỆ THỐNG CỬA HÀNG</h4>
                        <ul>
                            <li>
                                <h6>* CỬA HÀNG 1:</h6>
                                <p><i class="fas fa-map-pin"></i> Số 54, Triều Khúc, Thanh Xuân, Hà
                                    Nội</p>
                                <p><i class="fas fa-phone-square"></i> +84 123 456 789</p>
                            </li>
                        </ul>
                    </div>
                    <div class="content-ft">
                        <h4>HỖ TRỢ KHÁCH HÀNG</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-phone-square"></i> SĐT: +84 123 456 789</p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i> Email: hieuthuocutt@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <div class="content-ft">
                        <div class="social">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.195550833418!2d105.79664331533172!3d20.984796994652694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1624718389754!5m2!1svi!2s" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        var nav = document.getElementById('nav')
        var mobileMenu = document.getElementById('mobile-menu')
        mobileMenu.onclick = function() {
            var isClose = nav.clientHeight === 48;
            if (isClose) {
                nav.style.height = 'auto';
            } else {
                nav.style.height = '48px';
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
