<?php 
  require_once('IModel.php');
  require_once('./../db.php');
  class User extends DB implements IModel
  {
      public $tableName = 'users';
      
      function __construct(){
          parent::__construct();
      }
      
      public function getAll($page = 1,$countRows =10){
         $position = ($page-1)*$countRows;//0
         $query = $this->db->query('SELECT * FROM '.
         $this->tableName.' LIMIT '.$position.','.$countRows);
         return $query->fetchAll();
      }

      public function getOne($id){
        $query = $this->db->query('SELECT * FROM '
        .$this->tableName.' WHERE id='.$id);
        return $query->fetchAll();
      }
      
      public function deleteOne($id){
        $this->db->query('DELETE FROM '
        .$this->tableName.' WHERE id ='.$id);
      }

      public function insertOne($payload){
        /*username
        fullname	
        email
        phone
        address	
        level 
        0-admin;1-staff;2-bussiness;3 personal	
        status 0 - deactive, 1- active*/

        $stmn = $this->db->prepare('INSERT INTO '
        .$this->tableName.'(username,fullname,email,phone,address,level,status) 
        VALUES(:username, :fullname, :email, :phone, :address,:level,:status)');
        $stmn->execute(array(
          ':username'=>$payload['username'],
          ':fullname'=>$payload['fullname'],
          ':address'=>$payload['address'],
          ':phone'=>$payload['phone'],
          ':email'=>$payload['email'],
          ':level'=>$payload['level'],
          ':status'=>$payload['status']
        ));
      }

      public function updateOne($payload){
        $stmn = $this->db->prepare('UPDATE users 
        SET fullname=:fullname, 
        email=:email,
        address=:address
        phone=:phone,
        level=:level,
        status=:status
         WHERE id = :id');
        
        $stmn->execute(
          array(
            ':id'=>$payload['id'],
            ':fullname'=>$payload['fullname'],
            ':phone'=>$payload['phone'],
            ':address'=>$payload['address'],
            ':level'=>$payload['level'],
            ':status'=>$payload['status']
          )
          );
      }

  }
  
?>