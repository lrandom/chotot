<?php
 session_start();
 require_once './../config.php';
 if(!isset($_SESSION['user'])){
    header("Location:".BASE_URL."login.php");
 }
 if(isset($_GET['logout'])){
     //viết code xử lý đăng xuất ở đây luôn
 }

 require_once './../dals/province.php';
 $provinceDal = new Province();
 $provinces = $provinceDal->getAll(1,100);
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
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Ảnh 1</label>
                        <input type="file" accept="image/*" name="image[]" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Ảnh 2</label>
                        <input type="file" accept="image/*" name="image[]" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Ảnh 3</label>
                        <input type="file" accept="image/*" name="image[]" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Ảnh 4</label>
                        <input type="file" accept="image/*" name="image[]" class="form-control" placeholder="Tiêu đề">
                    </div>

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
                        <label>Tỉnh</label>
                        <select class="form-control" name="id_province">
                            <!--dùng vòng lặp-->
                            <option value="-1">Chọn tỉnh</option>
                            <?php
                              foreach ($provinces as $r){
                            ?>
                            <option value="<?php echo $r['id'] ?>">
                                <?php echo $r['name']; ?>
                            </option>
                            <?php
                              }
                            ?>
                        </select>
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

<script>
// ajax -> asynchorous javascript and xml 
// bất đồng bộ javascript và xml //song song <> queue 
// file trao đổi giữa php và javascript 
// json,jsonp, html
$('select[name="id_province"]').change(function(){
    var option = $(this).find('option:selected');
    //code xử lý
    var idProvince = option.val();
    console.log(idProvince);
    //gọi ajax để lấy về thành phố
    $.ajax({
    type: "post",
    url:"<?php echo BASE_URL;?>ajax/city.php", //đường dẫn đích xử lý request
    data: {
        id_province: idProvince
    },
    dataType: "html",
    success: function(response) {
        console.log(response);
    },
    error: function(response) {

    }
});
})

</script>

</html>