@extends('admin.layouts.layout')

@section('head')
    <title>Danh sách nhóm thuốc</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách nhóm thuốc</h1>
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
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-add"> <i class="fa fa-plus"></i>
                    Thêm nhóm thuốc</a>
            <p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách nhóm thuốc
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="table-admin">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th style="text-align: center;">Tên nhóm thuốc</th>
                                    <th style="text-align: center;">Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($nhomthuoc))
                                    @php $i = 1
                                    @endphp
                                    @foreach ($nhomthuoc as $item)
                                        <tr class="odd gradeX">
                                            <td class="" style="width: 80px; text-align: center;">{{ $i++ }}
                                            </td>
                                            <td class="" style="text-align: center; font-weight: 600; color: rgb(231, 38, 38)">
                                                {{ $item->ten_nhom_thuoc }}</td>
                                            <td class="center" style="text-align: center;">
                                                <a class="btn btn-success btn-xs btn-edit" href="#"
                                                    data-url="{{ route('admin.nhomthuoc.getEdit', ['id' => $item->id]) }}"
                                                    ​><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-danger btn-xs"
                                                    href="{{ route('admin.nhomthuoc.getDelete', ['id' => $item->id]) }}"
                                                    onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Xoá</a>
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
