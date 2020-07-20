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
 require_once './../dals/category.php';
 $provinceDal = new Province();
 $provinces = $provinceDal->getAll(1,100);
 $categoryDal = new Categories();
 $parentCategories = $categoryDal->getByParentId(0);

 

require_once './../dals/item.php';
require_once './../dals/item_image.php';
 //xử lý dữ liệu 
 //var_dump($_POST);
 if(isset($_POST['title'])){
     $data['title'] = $_POST['title'];
     $data['price'] = $_POST['price'];
     $data['content'] = $_POST['content'];
     $data['id_province'] = $_POST['id_province'];
     $data['id_city'] = $_POST['id_city'];
     $data['address'] = $_POST['address'];
     $data['id_category'] = $_POST['id_category'];
     $data['keyword'] = $_POST['keyword'];
     $data['description'] = $_POST['description'];
     $data['id_user'] = $_SESSION['user']['id'];
     //var_dump($data);
     $itemDAL = new Item();
     $lastInsertId = $itemDAL->insertOne($data);

     //tạo folder 
     if(!is_dir('./../uploads/items')){
        //nếu như chưa có folder thì tạo mới
        mkdir('./../uploads/items',0777); //4 doc 2 ghi 1 exe
     }
     if(!is_dir('./../uploads/items/'.date('Y').date('m'))){
        mkdir('./../uploads/items/'.date('Y').date('m'),0777);
     }

     for ($i=0; $i < 4 ; $i++) { 
        if(isset($_FILES['image'.$i]) 
        && $_FILES['image'.$i]['name']!=null){
           $destPathDir = './../uploads/items/'.date('Y').date('m');//thư mục đích
           $destPathFile =  $destPathDir.'/'.time().$i.$_FILES['image'.$i]['name'];
           move_uploaded_file(
               $_FILES['image'.$i]['tmp_name'],
               $destPathFile
           );
   
           $itemImageDAL = new ItemImage();
           $payload['id_item']=$lastInsertId;
           $payload['path']= $destPathFile;
           $payload['is_thumbnail']=1;
           $itemImageDAL->insertOne($payload);
        }
     }
 }//end insert data
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
                        <input type="file" accept="image/*" name="image0" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Ảnh 2</label>
                        <input type="file" accept="image/*" name="image1" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Ảnh 3</label>
                        <input type="file" accept="image/*" name="image2" class="form-control" placeholder="Tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Ảnh 4</label>
                        <input type="file" accept="image/*" name="image3" class="form-control" placeholder="Tiêu đề">
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
                        <label>Danh mục cha</label>
                        <select class="form-control" name="id_category">
                        <option value="-1">Chọn danh mục cha</option>
                            <?php
                              foreach ($parentCategories as $r){
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
                        <label>Danh mục con</label>
                        <select class="form-control" name="id_sub_category">
                        <option value="-1">Chọn tỉnh</option>
                            <?php
                              foreach ($categories as $r){
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
        $('select[name="id_city"]').html(response);
    },
    error: function(response) {

    }
});
})

$('select[name="id_category"]').change(function(){
    var option = $(this).find('option:selected');
    //code xử lý
    var idCategory = option.val();
    console.log(idCategory);
    //gọi ajax để lấy về danh mục con
    $.ajax({
    type: "post",
    url:"<?php echo BASE_URL;?>ajax/category.php", //đường dẫn đích xử lý request
    data: {
        id_parent: idCategory 
    },
    dataType: "html",
    success: function(response) {
        console.log(response);
        $('select[name="id_sub_category"]').html(response);
    },
    error: function(response) {

    }
});
})



</script>

</html>