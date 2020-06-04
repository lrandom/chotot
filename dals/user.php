<?php 
  require_once('./../db.php');
  class User extends DB implements IModel
  {
      public $tableName = 'users';
      
      __construct(){
          parent::__construct();
      }
      
      public function getAll($page =1,$countRows =10){
         $position = ($page-1)*$countRows;//0
         $query = self::db->query('SELECT * FROM '.
         self::tableName.' LIMIT '.$position.','.$countRows);
         return $query->getAll();
      }


  }
  
?>