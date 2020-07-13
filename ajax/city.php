<?php 
  require_once('./../dals/city.php');
  $city = new City();
  $idProvince = $_POST['id_province'];
  $list = $city->getByProvinceId($idProvince);
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