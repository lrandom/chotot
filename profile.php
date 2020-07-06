<?php
 session_start();
 if(!isset($_SESSION['user'])){
    header("Location:login.php");
 }
 if(isset($_GET['logout'])){
     //viết code xử lý đăng xuất ở đây luôn
 }
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'commons/header.php' ?>

<body>
    <?php require_once 'commons/nav.php' ?>
    <div class="container">
        <div class="col-md-4 col-xs-12">
            <?php require_once 'commons/user_menu.php'?>
        </div>
        <!--cột trái-->

        <div class="col-md-8 col-xs-12"></div>
        <!--cột phải-->
    </div>
    <?php require_once 'commons/footer.php' ?>
</body>

</html>