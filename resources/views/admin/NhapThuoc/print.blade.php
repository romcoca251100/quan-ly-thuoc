<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hoá đơn nhập</title>

    <!-- Styles -->
    <style>
        body {
            font-family: 'arial',
        }
        .header{
            text-align: center;
            margin-bottom: 50px;
        }

        .title {
            text-align: center;
            margin-top: 20px;
        }
        table {
            margin: 0 auto;
            font-size: 18px;
            margin-bottom: 30px;
        }
        #chi-tiet {
            border-collapse: collapse;
        }
        #chi-tiet,#chi-tiet th,#chi-tiet td {
            border: 1px solid black;
            padding: 5px 10px;
            font-size: 14px;
        }

        .tr-nhap, .tr-nhap td {
            border: 1px solid black;
            padding: 10px 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
   <div class="header">
       <h1>HOÁ ĐƠN NHẬP</h1>
   </div>

   <div class="main">
        <table>
            <tr>
                <td>Mã hoá đơn: </td>
                <th style="padding-left: 30px; color: rgb(119, 0, 0); text-align: left;">HDN{{$hdn->id}}</th>
            </tr>
            <tr>
                <td>Nhân viên nhập: </td>
                <th style="padding-left: 30px; text-align: left;">{{$hdn->nhan_vien?$hdn->nhan_vien->ho_ten:''}}</th>
            </tr>
            <tr>
                <td>Ngày nhập: </td>
                <th style="padding-left: 30px; text-align: left;">{{date('d-m-Y', strtotime($hdn->ngay_lap))}}</th>
            </tr>
            <tr>
                <td>Tổng tiền: </td>
                <th style="padding-left: 30px; text-align: left;">{{number_format($tong_tien)}}</th>
            </tr>
    </table>

    <div class="title">
        <h3>CHI TIẾT HOÁ ĐƠN NHẬP</h3>
    </div>
    <table id="chi-tiet">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th></th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($cthdn))
                <?php $i = 1; ?>
                @foreach ($cthdn as $item)
                    <tr class="tr-nhap">
                        <td>{{$i++}}</td>
                        <td>{{$item->thuoc?$item->thuoc->ten_thuoc:''}}</td>
                        <td>{{$item->so_luong}}</td>
                        <td>{{number_format($item->don_gia)}} VNĐ</td>
                        <td>{{number_format($item->thanh_tien)}} VNĐ</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
   </div>
</body>
</html>