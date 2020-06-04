<?php 
  interface IModel{
      public function getAll();
      public function getOne();
      public function deleteOne();
      public function insertOne();
      public function updateOne();
  }
?>