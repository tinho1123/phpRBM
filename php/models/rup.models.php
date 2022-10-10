<?php


Class RupModel {
     private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function create($cpf_cnpj, $nome ,$nascimento,$sexo ,$email , $message) {
        
      $sql = $this->db->prepare("INSERT INTO rup(cpf_cnpj, nome, data_nascimento, sexo ,email, mensagem) 
      values ('$cpf_cnpj','$nome','$nascimento', '$sexo', '$email', '$message')");
      $sql->execute();
    }

    function readOne($cpf_cnpj) {
      $sql = $this->db->prepare("SELECT * FROM rup WHERE cpf_cnpj='$cpf_cnpj'");
      $sql->execute();
      $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
      return $consulta;
    }

    function read() {
      $sql = $this->db->prepare('SELECT * FROM rup');
      $sql->execute();
      $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
      return $consulta;
    }

    function update(int $id, array $arr) {
      try {
        
        $query = 'UPDATE rup SET';
        foreach($arr as $name => $value) {
          
          $query .= " $name='".$value."',";
        }
          $new_query = substr($query, 0, -1);
           $sql = $this->db->prepare($new_query." WHERE id = '$id'");
          $sql->execute(); 
      } catch(Exception $e) {
        echo 'Exceção capturada:', $e->getMessage(), '\n';
      }
      
    }

    function delete($cpf_cnpj) {
        $sql = $this->db->prepare("DELETE FROM rup WHERE cpf_cnpj = $cpf_cnpj");
        $sql->execute();
    }
}



