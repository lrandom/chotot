<?php
   session_start();
   //check xem người dùng đã đăng nhập hay chưa 
   if(isset($_SESSION['user'])){
       header('Location:profile.php');
   }
   if(isset($_SESSION['error'])){
       unset($_SESSION['error']);
   }
   if(isset($_POST['email'])){
       //kiểm tra xem ngừoi dùng gửi thông tin đăng nhập hay chưa 
       $email = $_POST['email'];
       $pwd = md5($_POST['pwd']);

       require_once('dals/user.php');
       $userDal = new User();
       $user= $userDal->checkLogin($email,$pwd);
       if($user!=null){
         $_SESSION['user']=$user;
         header('Location:profile.php');     
       }else{
         $_SESSION['error'] = 'Không tìm thấy user, thử lại !!!';
         //exit();
       }
   }
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'commons/header.php' ?>

<body>
    <?php require_once 'commons/nav.php'?>
    <div class="container">
        <?php if(isset($_SESSION['error'])){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_SESSION['error'];?>
        </div>
        <?php }?>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" name="email" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" name="pwd" class="form-control" id="exampleInputPassword1"
                    placeholder="Password">
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Ghi nhớ đăng nhập</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <?php require_once 'commons/footer.php'?>
</body>

</html>