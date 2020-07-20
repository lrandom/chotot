<!DOCTYPE html>
<html lang="en">
<?php require_once 'commons/header.php' ?>

<body>
    <?php require_once 'commons/nav.php'?>
    <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://static.chotot.com.vn/storage/admin-centre/buyer_collection_y_homepage_banner/buyer_collection_y_homepage_banner_1594367840307.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://static.chotot.com.vn/storage/admin-centre/buyer_collection_y_homepage_banner/buyer_collection_y_homepage_banner_1594091789176.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://static.chotot.com.vn/storage/admin-centre/buyer_collection_y_homepage_banner/buyer_collection_y_homepage_banner_1594091738812.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="row" style="margin-top:20px">
   <!--load danh mục -->
<?php 
  require_once('./dals/category.php');
  $dalCat = new Categories();
  $cats=$dalCat->getByParentId(0);
  if($cats!=null){
      foreach($cats as $r){
          ?>
        <div class="col-md-2" style="position:relative;text-align:center">
            <img src="https://via.placeholder.com/150"/>
            <h5 class="cat-name"><?php echo $r['name']; ?></h5>
        </div>
          <?php
      }
  }
?>
</div>
<!--end container-->
    <?php require_once 'commons/footer.php'?>
</body>

<style>
    h5.cat-name{
        position: absolute;
        font-size:16px;
        bottom:0px;
        left:20px;
        color: white;
    }
</style>

</html>