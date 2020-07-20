<?php 
  require_once('./../dals/category.php');
  $category = new Categories();
  $idParent = $_POST['id_parent'];
  //lấy ra danh sách danh mục con dựa theo id parent
  $list = $category->getByParentId($idParent);
?>

<?php 
   if(count($list)>0){
     foreach ($list as $r) {
       ?>
        <option value="<?php echo $r['id'] ?>">
          <?php echo $r['name']; ?>
        </option>
      <?php
     }
   }
?>