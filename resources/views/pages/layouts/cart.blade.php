<div class="row">
    <div class="col-9">
        <table class="table">
            <thead class="bg-success">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên thuốc</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Xoá</th>
                </tr>
            </thead>

            <tbody>
                @if (Session::has('Cart') != null && Session::get('Cart')->thuoc)
                    <?php $i = 1; ?>
                    @foreach (Session::get('Cart')->thuoc as $item)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $item['thuocInfo']->ten_thuoc }}</td>
                            <td>
                                <img src="{{ asset($item['thuocInfo']->hinh_anh) }}" alt="" width="170px"
                                    height="150px">
                            </td>
                            <td><select name="so_luong" id="select-{{ $item['thuocInfo']->id }}"
                                    data-idselect="{{ $item['thuocInfo']->id }}"
                                    onchange="updateItemCart({{ $item['thuocInfo']->id }})">
                                    @for ($i = 1; $i <= $item['thuocInfo']->so_luong; $i++)
                                        <option value="{{ $i }}" @if ($i == $item['so_luong']) selected @endif>
                                            {{ $i }}</option>
                                    @endfor
                            </td>
                            <td>{{ number_format($item['thuocInfo']->don_gia_ban) }} VNĐ</td>
                            <td>
                                <i class="fas fa-trash-alt" style="color: red; cursor: pointer;"
                                            onclick="deleteItemCart({{ $item['thuocInfo']->id }})"></i>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="6" style="text-align: center;">Bạn chưa đặt sản phẩm nào!</th>
                    </tr>
                @endif
            </tbody>

        </table>
    </div>
    <div class="col-3" style="overflow: hidden;">
        <div class="card col-10">
            <div class="card-header">
                <h4>THANH TOÁN</h4>
            </div>
            <div class="card-body">
                <h5 class="card-title">Tổng số lượng: </h5>
                <p class="card-text">
                    @if (isset(Session::get('Cart')->tongSoluong))
                        {{ number_format(Session::get('Cart')->tongSoluong) }}
                    @else
                        0
                    @endif
                </p>
                <hr>
                <h5 class="card-title">Tổng tiền: </h5>
                <p class="card-text">
                    @if (isset(Session::get('Cart')->tongGia))
                        {{ number_format(Session::get('Cart')->tongGia) }} VNĐ
                    @else
                        0 VNĐ
                    @endif
                </p>
                <hr>
                <a href="#" class="btn btn-success">Thanh toán</a>
            </div>
        </div>
    </div>
</div>
