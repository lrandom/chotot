<?php 
  require_once('./../db.php');
  class User extends DB implements IModel
  {
      public $tableName = 'users';
      
      function __construct(){
          parent::__construct();
      }
      
      public function getAll($page =1,$countRows =10){
         $position = ($page-1)*$countRows;//0
         $query = $this->db->query('SELECT * FROM '.
         $this->tableName.' LIMIT '.$position.','.$countRows);
         return $query->fetchAll();
      }


  }
  
?>