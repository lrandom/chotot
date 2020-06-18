<?php 
  interface IModel{
      public function getAll();
      public function getOne($id);
      public function deleteOne($id);
      public function insertOne($payload);
      public function updateOne($payload);
  }
?>