<?php 
   require_once('./../../dals/user.php');//include dal user
   $userDal = new User(); //khoi tao dal
   $result = $userDal->getAll();//lấy về danh sách các người dùng
   if(isset($_GET['action']) && $_GET['action']=='delete'){
     //Xoá
     $id = $_GET['id'];
     $userDal->deleteOne($id);
   } 
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once './../commons/header.php' ?>

<body>
    <?php require_once './../commons/nav.php'?>
    <br>
    <div class="container">
        <div class="table-responsive">
            <a class="btn btn-success" href="add.php">Thêm mới</a>
            <br>
            <br>
            <table class="table">
                <tr>
                    <td>id</td>
                    <td>username</td>
                    <td>fullname</td>
                    <td>email</td>
                    <td>phone</td>
                    <td>address</td>
                    <td>level</td>
                    <td>status</td>
                    <td>Thao tác</td>
                    </th>
                </tr>

                <?php 
                  foreach ($result as $r){
                 ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['username']?></td>
                    <td><?php echo $r['fullname']?></td>
                    <td><?php echo $r['email']?></td>
                    <td><?php echo $r['phone']?></td>
                    <td><?php echo $r['address']?></td>
                    <td>
                        <?php 
                          if($r['level']==0){
                            echo '<span class="badge badge-pill badge-primary">Admin</span>';
                          }

                          if($r['level']==1){
                            echo '<span class="badge badge-pill badge-primary">Nhân viên</span>';
                          }

                          if($r['level']==2){
                            echo '<span class="badge badge-pill badge-primary">Bán chuyên</span>';
                          }

                          if($r['level']==3){
                            echo '<span class="badge badge-pill badge-primary">Thường</span>';
                          }
                        ?>
                    </td>
                    <td>
                        <?php 
                          if($r['status']==0){
                            echo '<span class="badge badge-pill badge-danger">Chưa kích hoạt</span>';
                          }

                          if($r['status']==1){
                            echo '<span class="badge badge-pill badge-success">Kích hoạt</span>';
                          }
                        ?>
                    </td>
                    <td>
                        <a href="?id=<?php echo $r['id'] ?>&action=delete">Xoá</a> |
                        <a href="edit.php?id=<?php echo $r['id']; ?>">Sửa</a>
                    </td>
                </tr>
                <?php
                  }
                ?>
            </table>

            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <?php require_once './../commons/footer.php'?>
</body>

</html>