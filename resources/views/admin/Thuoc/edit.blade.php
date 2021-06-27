@extends('admin.layouts.layout')
@section('head')
    <title>Sửa thuốc</title>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thuốc</h1>
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
                    Sửa thuốc
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" action="{{ route('admin.thuoc.postEdit', ['id'=>$thuoc->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div id="them-thuoc">
                                    <div class="form-group">
                                        <label for="nhom_thuoc_id">Nhóm thuốc</label>
                                        <select class="form-control" style="width: 30%" name="nhom_thuoc_id"
                                            id="nhom_thuoc_id">
                                            <option value="" disabled selected>--- Nhóm thuốc ---</option>
                                            @if (isset($nhomthuoc))
                                                @foreach ($nhomthuoc as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item->id == $thuoc->nhom_thuoc_id)
                                                            selected
                                                        @endif
                                                        >{{ $item->ten_nhom_thuoc }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ten_thuoc">Tên thuốc</label>
                                        <input class="form-control" id="ten_thuoc" name="ten_thuoc"
                                            placeholder="Nhập tên thuốc..." value="{{ $thuoc->ten_thuoc }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="so_luong">Số lượng</label>
                                        <input type="number" style="width: 30%" class="form-control" id="so_luong"
                                            name="so_luong" placeholder="Nhập giá sản phẩm"  value="{{ $thuoc->so_luong }}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_nhap">Đơn giá nhập (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_nhap"
                                            name="don_gia_nhap" placeholder="Nhập giá sản phẩm" value="{{ $thuoc->don_gia_nhap }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="don_gia_ban">Đơn giá bán (VNĐ)</label>
                                        <input type="number" style="width: 30%" class="form-control" id="don_gia_ban"
                                            name="don_gia_ban" placeholder="Nhập giá sản phẩm" value="{{ $thuoc->don_gia_ban }}" >
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <label for="hinh_anh">Hình ảnh sản phẩm</label>
                                                <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh">
                                            </div>
                                            <span>Xem trước: </span>
                                            <img id="blah" width="150px" height="150px" src="{{ asset($thuoc->hinh_anh) }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="ghi_chu">Ghi chú</label>
                                        <textarea class="form-control" id="ghi_chu" name="ghi_chu" placeholder=""
                                            rows="5">{{ $thuoc->ghi_chu }}</textarea>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary mb-2" value="Sửa">
                                <input type="reset" class="btn btn-default" value="Nhập lại" id="nhap-lai">

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
@endsection
