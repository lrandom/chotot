<?php
class DB
{
  public $db = null;
  
  function __construct(){
    $this->getDB();
  }
  
  public function getDB()
  {
    $this->db = new PDO('mysql:host=localhost;dbname=marketplaces', 'root', 'koodinh');
    return $this->db;
  }

  public function disconnect()
  {
    $this->db = null;
  }
}

?>