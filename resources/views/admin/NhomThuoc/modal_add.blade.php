<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thêm loại sản phẩm</h4>
            </div>
            <form role="form" method="POST" action="{{ route('admin.nhomthuoc.postAdd') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ten_nhom_thuoc">Tên nhóm thuốc</label>
                        <input class="form-control" name="ten_nhom_thuoc" id="ten_nhom_thuoc">
                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-default" data-dismiss="modal">Huỷ</a>
                    <input type="submit" class="btn btn-primary" value="Thêm">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
