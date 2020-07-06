<?php
 session_start();
 require_once './../config.php';
 if(!isset($_SESSION['user'])){
    header("Location:".BASE_URL."login.php");
 }
 if(isset($_GET['logout'])){
     //viết code xử lý đăng xuất ở đây luôn
 }
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once '../commons/header.php' ?>

<body>
    <?php require_once '../commons/nav.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <?php require_once '../commons/user_menu.php'?>
            </div>
            <!--cột trái-->

            <div class="col-md-8 col-xs-12">
                <!--danh sách tin đăng-->
                <a href="add.php">Thêm tin</a>
            </div>
            <!--cột phải-->
        </div>
    </div>
    <?php require_once '../commons/footer.php' ?>
</body>

</html>