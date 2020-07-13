<?php 
  require_once('./../dals/city.php');
  $city = new City();
  $list = $city->getAll();
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