<?php 
  require_once('IModel.php');
  require_once('db.php');
  class Item extends DB implements IModel
  {
    public $tableName = 'items';
      
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
            title,
            price,
            content,
            id_city,
            address,
            id_category,
            keyword,
            id_user,
            description
        ) VALUES(:title,:price,:content,:id_city,
        :address,
        :id_category,:keyword,:id_user,:description)');
        try{
        $stmn->execute(
           array(
            ':title' => $payload['title'],
            ':price'=>$payload['price'],
            ':content'=>$payload['content'],
            ':id_city'=>$payload['id_city'],
            ':address'=>$payload['address'],
            ':id_category'=>$payload['id_category'],
            ':keyword'=>$payload['keyword'],
            ':id_user'=>$payload['id_user'],
            ':description'=>$payload['description']
           )
        );
    }catch(Exception $e){
        echo $e->getMessage();
    }
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