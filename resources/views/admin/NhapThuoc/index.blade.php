@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách nhóm thuốc</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách hoá đơn nhập thuốc</h1>
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
            <p>
                <a class="btn btn-primary" href="{{ route('admin.hoadonnhap.getAdd') }}"> <i class="fa fa-plus"></i>
                    Thêm mới</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách hoá đơn nhập thuốc
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã hoá đơn</th>
                                    <th>Người lập</th>
                                    <th>Ngày lập</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($hoadonnhap))
                                    @php $i = 1
                                    @endphp
                                    @foreach ($hoadonnhap as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                            </td>
                                            <td class="" style="font-weight: 600; color: rgb(231, 38, 38)">
                                                {{ $item->id }}</td>
                                            <td class="" style="">{{ $item->nhan_vien->ho_ten }}</td>
                                            <td class="" style="">{{ date('d/m/Y', strtotime($item->ngay_lap)) }}</td>
                                            <td class="center" style="text-align: center;">
                                                <a class="btn btn-primary btn-xs btn-edit" href="#"
                                                    data-url=""
                                                    ​><i class="fa fa-edit"></i> Xem chi tiết</a>
                                                <a class="btn btn-success btn-xs"
                                                    href=""><i class="fa fa-trash"></i> In hoá đơn</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @include('admin.NhomThuoc.modal_add')
    @include('admin.NhomThuoc.modal_edit')

@endsection

@section('script')

    <script>
        $('.btn-edit').click(function(e) {
            var url = $(this).attr('data-url');
            $('#modal-edit').modal('show');
            e.preventDefault();
            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function(response) {
                    //đưa dữ liệu controller gửi về điền vào input trong form edit.
                    $('#name-edit').val(response.data.ten_nhom_thuoc);
                    $('#name-lsp').val(response.data.ten_nhom_thuoc);
                    //thêm data-url chứa route sửa todo đã được chỉ định vào form sửa.
                    $('#form-edit').attr('action', '{{ asset('admin/nhom-thuoc/sua/') }}/' +
                        response.data
                        .id)
                },
                error: function(error) {

                }
            })
        })
    </script>

@endsection
