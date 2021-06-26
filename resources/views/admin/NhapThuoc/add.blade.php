@extends('admin.layouts.layout')
@section('head')
    <title>Nhập thuốc</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nhập thuốc</h1>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif
    @if (session('thongbao'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session('thongbao') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Nhập mới thuốc
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.hoadonnhap.postAdd') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="them-thuoc">
                                    <div class="form-group">
                                        <label for="nhom_thuoc_id" style="color: red">Nhập thuốc 1</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="nhom_thuoc_id">Nhóm thuốc</label>
                                        <select class="form-control" style="width: 30%" name="nhom_thuoc_id[]"
                                            id="nhom_thuoc_id">
                                            <option value="" disabled selected>--- Nhóm thuốc ---</option>
                                            @if (isset($nhomthuoc))
                                                @foreach ($nhomthuoc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_nhom_thuoc }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_thuoc">Tên thuốc</label>
                                        <input class="form-control" id="ten_thuoc" name="ten_thuoc[]"
                                            placeholder="Nhập tên thuốc...">
                                    </div>

                                    <div class="form-group">
                                        <label for="so_luong">Số lượng</label>
                                        <input type="number" style="width: 30%" class="form-control" id="so_luong"
                                            name="so_luong[]" placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_nhap">Đơn giá nhập (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_nhap"
                                            name="don_gia_nhap[]" placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_ban">Đơn giá bán (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_ban"
                                            name="don_gia_ban[]" placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="ghi_chu">Ghi chú</label>
                                        <textarea class="form-control" id="ghi_chu" name="ghi_chu[]" placeholder=""
                                            rows="5"></textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary mb-2" value="Thêm">
                                <input type="reset" class="btn btn-default" value="Nhập lại" id="nhap-lai">
                                <a type="button" class="btn btn-success" value="Thêm sản phẩm" id="them-san-pham">Thêm sản
                                    phẩm</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#hinhanh").change(function() {
            readURL(this);
        });
    </script>
    <script>
        i = 2
        $('#them-san-pham').click(function() {
            html = `
            <hr>
            <hr>
            <div class="form-group">
                <label for="nhom_thuoc_id" style="color: red">Nhập thuốc ${i}</label>
            </div>
            <div class="form-group">
                                        <label for="nhom_thuoc_id">Nhóm thuốc</label>
                                        <select class="form-control" style="width: 30%" name="nhom_thuoc_id[]"
                                            id="nhom_thuoc_id">
                                            <option value="" disabled selected>--- Nhóm thuốc ---</option>
                                            @if (isset($nhomthuoc))
                                                @foreach ($nhomthuoc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_nhom_thuoc }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_thuoc">Tên thuốc</label>
                                        <input class="form-control" id="ten_thuoc" name="ten_thuoc[]"
                                            placeholder="Nhập tên thuốc...">
                                    </div>

                                    <div class="form-group">
                                        <label for="so_luong">Số lượng</label>
                                        <input type="number" style="width: 30%" class="form-control" id="so_luong" name="so_luong[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_nhap">Đơn giá nhập (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_nhap" name="don_gia_nhap[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_ban">Đơn giá bán (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_ban" name="don_gia_ban[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="ghi_chu">Ghi chú</label>
                                        <textarea class="form-control" id="ghi_chu" name="ghi_chu[]" placeholder=""
                                            rows="5"></textarea>
                                    </div>`
            $('#them-thuoc').append(html)
            i++
        })
        $('#nhap-lai').click(function() {
            html = `
            <div class="form-group">
                <label for="nhom_thuoc_id" style="color: red">Nhập thuốc 1</label>
            </div>
            <div class="form-group">
                                        <label for="nhom_thuoc_id">Nhóm thuốc</label>
                                        <select class="form-control" style="width: 30%" name="nhom_thuoc_id[]"
                                            id="nhom_thuoc_id">
                                            <option value="" disabled selected>--- Nhóm thuốc ---</option>
                                            @if (isset($nhomthuoc))
                                                @foreach ($nhomthuoc as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_nhom_thuoc }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_thuoc">Tên thuốc</label>
                                        <input class="form-control" id="ten_thuoc" name="ten_thuoc[]"
                                            placeholder="Nhập tên thuốc...">
                                    </div>

                                    <div class="form-group">
                                        <label for="so_luong">Số lượng</label>
                                        <input type="number" style="width: 30%" class="form-control" id="so_luong" name="so_luong[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_nhap">Đơn giá nhập (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_nhap" name="don_gia_nhap[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_ban">Đơn giá bán (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_ban" name="don_gia_ban[]"
                                            placeholder="Nhập giá sản phẩm" value="0">
                                    </div>

                                    <div class="form-group">
                                        <label for="ghi_chu">Ghi chú</label>
                                        <textarea class="form-control" id="ghi_chu" name="ghi_chu[]" placeholder=""
                                            rows="5"></textarea>
                                    </div>`
            $('#them-thuoc').html(html)
        })
    </script>
@endsection
