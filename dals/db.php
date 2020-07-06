<?php
class DB
{
  public $db = null;
  
  function __construct(){
    $this->getDB();
  }
  
  public function getDB()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=chotot', 'root', 'koodinh');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->exec("set names utf8");//set charset utf8 để hỗ trợ dữ liệu có dấu
    return $this->db;
  }

  public function disconnect()
  {
    $this->db = null;
  }
}

?>