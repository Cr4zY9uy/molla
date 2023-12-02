<?php
?>
<div class="mb-4">
    <div class="row">
        <div class="mb-4 col-lg-6">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                Thêm cửa hàng
            </button>
        </div>
        <div class="col-lg-6">
            <form action="?controller=stores&action=search" method="post">
                <input type="search" class="form-control" name="timkiem" id="timkiem"
                    placeholder="Tìm kiếm tên cửa hàng.." required>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên cửa hàng</th>
                <th>Địa chỉ</th>
                <th>Hình ảnh</th>
                <th>Số điện thoại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storessearch as $store): ?>
            <tr>
                <td>
                    <?php echo $store['namestore']; ?>
                </td>
                <td>
                    <?php echo $store['address']; ?>
                </td>
                <td>
                    <img src="../uploads/<?php echo $store['ulr']; ?>" alt="Store Image" width="120">
                </td>
                <td>
                    <?php echo $store['phonestore']; ?>
                </td>
                <td class="flex">
                    <form action="?controller=stores&action=deletebyid" method="post">
                        <input type="hidden" name="id" value="<?php echo $store['id']; ?>">
                        <a class="btn btn-warning edit-button" style="margin-bottom: 10px;" data-bs-toggle="modal"
                            data-bs-target="#editModal<?php echo $store['id']; ?>"
                            data-id="<?php echo $store['id']; ?>">Sửa</a>
                        <button class="btn btn-danger delete-button" onclick="return confirmDelete()">Xóa</button>
                    </form>
                </td>
            </tr>
            <!-- Popup sửa danh mục -->
            <div class="modal fade" id="editModal<?php echo $store['id']; ?>" tabindex="-1" role="dialog"
                aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa cửa hàng</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="?controller=stores&action=updatestore" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $store['id']; ?>" name="id">
                                    <label for="editname">Tên cửa hàng:</label>
                                    <input type="text" class="form-control" id="editname" name="editname"
                                        value="<?php echo $store['namestore']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="editaddress">Địa chỉ:</label>
                                    <textarea class="form-control" id="editaddress" name="editaddress"
                                        required><?php echo $store['address']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Hình ảnh:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="editphonestore">Số điện thoại:</label>
                                    <input type="text" class="form-control" id="editphonestore" name="editphonestore"
                                        value="<?php echo $store['phonestore']; ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </tbody>
    </table>



</div>




<!-- Popup thêm danh mục -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="?controller=stores&action=addstore" method="post" class="modal-dialog" role="document"
        enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm cửa hàng</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="addName">Tên cửa hàng:</label>
                    <input type="text" class="form-control" id="addName" name="name">
                </div>
                <div class="form-group">
                    <label for="addAddress">Địa chỉ:</label>
                    <textarea class="form-control" id="addAddress" name="address"></textarea>
                </div>
                <div class="form-group">
                    <label for="addImage">Chọn ảnh:</label> <br>
                    <input type="file" id="addImage" name="image" class="form-control" required>
                </div>
                <div class=" form-group">
                    <label for="addPhone">Số điện thoại:</label>
                    <input type="text" class="form-control" id="addPhone" name="phonestore">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="addstorebtn" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </form>
</div>

<script>
$(document).ready(function() {

});

function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa?");
}
</script>