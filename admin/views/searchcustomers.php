<div class="mb-4">
    <div class="row ">
        <div class="mb-4 col-lg-6">
            <h2>Quản lý khách hàng</h2>
        </div>
        <div class="col-lg-6">
            <form action="?controller=customers&action=search" method="post">
                <input type="search" class="form-control" name="timkiem" id="timkiem" placeholder="Tìm kiếm khách hàng"
                    required>
            </form>
        </div>
    </div>

    <?php if (isset($messageDelete)): ?>
    <script>
    alert("<?php echo $messageDelete; ?>")
    </script>
    <?php endif ?>
    <?php if (isset($messageUpdate)): ?>
    <script>
    alert("<?php echo $messageUpdate; ?>")
    </script>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerssearch as $customer): ?>
            <tr>
                <td>
                    <?php echo $customer["name"] ?>
                </td>
                <td>
                    <?php echo $customer["email"] ?>
                </td>
                <td>
                    <?php echo $customer["phone"] ?>
                </td>
                <td>
                    <?php echo $customer["address"] ?>
                </td>
                <td class="flex">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
                        <a class="btn btn-primary edit-button" data-bs-toggle="modal"
                            data-bs-target="#customer<?php echo $customer["id"]; ?>" data-id="">Sửa</a>
                        <button class="btn btn-danger delete-button" name="delete"
                            onclick="return confirmDelete()">Xóa</button>
                    </form>
                </td>
            </tr>
            <!-- Popup sửa danh mục -->
            <div class="modal fade" id="customer<?php echo $customer["id"]; ?>" tabindex="-1" role="dialog"
                aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Sửa khách hàng</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="editName">Tên:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?php echo $customer["name"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="editName">Email:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="<?php echo $customer["email"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="editName">SĐT:</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="<?php echo $customer["phone"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="editName">Địa chỉ:</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="<?php echo $customer["address"] ?>" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" data-bs-dismiss="modal" name="update"
                                    class="btn btn-primary">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </tbody>
    </table>



</div>






<script>
$(document).ready(function() {

});

function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa?");
}
</script>