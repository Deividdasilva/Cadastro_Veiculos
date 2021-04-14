<?php

  class Connection extends PDO{

    public function __construct(){
      try{
        parent::__construct("mysql:host=localhost;dbname=deividsilva", "root", "");
        parent::exec("set names utf8");
      }catch(PDOException $e){
        echo "Erro ao conectar" . $e->getMessage();
        exit;
      }
    }
  }