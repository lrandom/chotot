<?php 
  require_once('IModel.php');
  require_once('db.php');
  class ItemImage extends DB implements IModel
  {
    public $tableName = 'item_images';
      
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
        $stmn = $this->db->prepare('INSERT INTO '.$this->tableName.'(
            path,
            id_item,
            is_thumbnail
        ) VALUES(:path,:id_item,:is_thumbnail)');
        $stmn->execute(
           array(
            ':path' => $payload['path'],
            ':id_item'=>$payload['id_item'],
            ':is_thumbnail'=>$payload['is_thumbnail']
           )
        );
        return $this->db->lastInsertId();//trả id sau khi thêm bản ghi
    }

    public function updateOne($payload){
        $stmn = $this->db->prepare('UPDATE 
        '.$this->tableName.' 
        SET name=:name,code=:code WHERE id=:id');
        $stmn->execute(
          array(
            ':name'=>$payload['name'],
            ':code'=>$payload
        ));
    }
  }
  
?>