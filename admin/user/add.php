<!DOCTYPE html>
<html lang="en">
<?php require_once('./commons/header.php') ?>

<body>
    <?php require_once('./commons/nav.php') ?>
    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu</label>
                <input type="password" name="pwd" class="form-control" placeholder="Tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Họ tên</label>
                <input type="text" name="fullname" class="form-control" placeholder="Tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Số đt</label>
                <input type="number" name="phone" class="form-control" placeholder="Tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Tên đăng nhập">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Cấp độ</label>
                <select class="form-control" name="level">
                    <option value="0">Admin</option>
                    <option value="1">Nhân viên</option>
                    <option value="2">Bán chuyên</option>
                    <option value="3">Nguời dùng cá nhân</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <select class="form-control" name="status">
                    <option value="0">Chưa kích hoạt</option>
                    <option value="1">Kích hoạt</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php require_once('./commons/footer.php')?>
</body>

</html>