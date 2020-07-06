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
                <form>
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="title" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" name="price" class="form-control" placehoder="Giá">
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" name="content"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Thành phố</label>
                        <select class="form-control" name="id_city">
                            <!--dùng vòng lặp-->
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" name="address"></input>
                    </div>

                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="id_category">
                            <!--dùng vòng lặp-->
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Từ khoá</label>
                        <input class="form-control" type="text" name="keyword"></input>
                    </div>

                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!--cột phải-->
        </div>
    </div>
    <?php require_once '../commons/footer.php' ?>
</body>

</html>