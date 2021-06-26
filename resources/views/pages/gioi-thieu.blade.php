@extends('pages.layouts.page')

@section('mapping')
    <span><a href="/" class="">Trang chủ</a></span> / <span><a href="{{ route('index.getGioiThieu') }}"
            class="">Giới thiệu</a></span>
@endsection

@section('content-pra')
    <div class="page-products">
        <div class="content-page-contact">
            Nhà thuốc UTT
                Là Nhà thuốc được Sở Y tế Hà nội chứng nhận đạt tiêu chuẩn "Thực hành tốt nhà thuốc (GPP).
                Nhà thuốc cung cấp tất cả các thuốc, đặc biệt là thuốc và các biệt dược tiên tiến, hiện đại dùng điều trị bệnh tim mạch với chất lượng tốt nhất và đúng giá quy định. Người bệnh mua thuốc được các bác sĩ, dược sĩ tư vấn tận tình, chu đáo và dễ hiểu. Tại Nhà thuốc Mạnh Cường, người bệnh có thể tìm được những loại thuốc quý hiếm nhất để điều trị bệnh tim mạch mà có thể các Nhà thuốc khác không có.
                Nếu không dung nạp thuốc, người bệnh sẽ được xem xét những loại thuốc mình đang sử dụng và nếu thuốc đó không hợp với người bệnh, Nhà thuốc sẽ nhập lại những mà thuốc người bệnh đã mua tại Nhà thuốc, tránh lãng phí cho người bệnh.
        </div>
    </div>
@endsection
