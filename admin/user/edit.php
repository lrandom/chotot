<?php 
   session_start();
   require_once('./../../dals/user.php');
   if(isset($_SESSION['success'])){
       unset($_SESSION['success']);
   }


   
   if(isset($_POST['username'])){
    $data['username'] = trim($_POST['username']);
    $data['fullname'] = trim($_POST['fullname']);
    $data['email'] = trim($_POST['email']);
    $data['address'] = $_POST['address'];
    $data['phone'] = $_POST['phone'];
    $data['level'] = $_POST['level'];
    $data['status'] = $_POST['status'];
    echo $_POST['status'];//exit();
    //Lấy user từ csdl 
    $id = $_GET['id'];
    $data['id']=$id;
    $user = new User();
    //Cập nhật dữ liệu mới
    $user->updateOne($data);
    //thêm thông báo 
    $_SESSION['success'] = [
        'msg'=>'Sửa thành công'
    ];
   }

   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user = new User();
    $user = $user->getOne($id);
    $user = $user[0];
   }
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('./../commons/header.php') ?>

<body>
    <?php require_once('./../commons/nav.php') ?>
    <div class="container">
        <br>
        <!-- BREADCUM -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="index.php">Nguời dùng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </nav>

        <?php 
        if(isset($_SESSION['success'])){
            ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']['msg']; ?>
        </div>
        <?php
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập"
                    value="<?php echo $user['username']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Họ tên</label>
                <input type="text" name="fullname" class="form-control" placeholder="Tên đăng nhập"
                    value="<?php echo $user['fullname']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email"
                    value="<?php echo $user['email']; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Số đt</label>
                <input type="number" name="phone" class="form-control" placeholder="Tên đăng nhập"
                    value="<?php echo $user['phone']?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" name="address" class="form-control" placeholder="Tên đăng nhập"
                    value="<?php echo $user['address'];?>"> </div>

            <div class=" form-group">
                <label for="exampleInputEmail1">Cấp độ</label>
                <select class="form-control" name="level">
                    <option value="0" <?php if($user['level']==0){echo 'selected';} ?>>Admin</option>
                    <option value="1" <?php if($user['level']==1){echo 'selected';} ?>>Nhân viên</option>
                    <option value="2" <?php if($user['level']==2){echo 'selected';} ?>>Bán chuyên</option>
                    <option value="3" <?php if($user['level']==3){echo 'selected';} ?>>Nguời dùng cá nhân</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <select class="form-control" name="status">
                    <option value="0" <?php if($user['status']==0){echo 'selected';} ?>>Chưa kích hoạt</option>
                    <option value="1" <?php if($user['status']==1){echo 'selected';} ?>>Kích hoạt</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php require_once('./../commons/footer.php')?>
</body>

</html>