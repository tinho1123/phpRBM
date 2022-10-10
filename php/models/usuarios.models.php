<?php
Class UsersModel {
     private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function login($email) {
      $sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = '$email'");
      $sql->execute();
      $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
      return $consulta;
    }

    function log_acesso($id) {
      $sql = $this->db->prepare("INSERT INTO log_acessos(fk_usuario) 
      values ('$id')");
      $sql->execute();
    }

    function create($nome, $email ,$senha,$fk_empresa ,$fk_nivel_acesso) {
        
      $sql = $this->db->prepare("INSERT INTO usuarios(nome, email ,senha,fk_empresa ,fk_nivel_acesso) 
      values ('$nome', '$email' ,'$senha','$fk_empresa' ,'$fk_nivel_acesso')");
      $sql->execute();
    }

    function read() {
      $sql = $this->db->prepare('SELECT * FROM usuarios');
      $sql->execute();
      $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
      return $consulta;
    }

    function update(int $id, array $arr) {
      try {
        $updates = array_filter($arr, function ($value) {
          return $value !== null;
       });
        $query = 'UPDATE usuarios SET';
        foreach($updates as $name) {
          $query .= ' '.$name.'=:'.$name.',';
        }
          $query.substr($query, 0, -1);
          $query .= 'data_hora="'.date("Y-m-d H:i:s").'"';
  
          $sql = $this->db->prepare($query."WHERE id = $id");
          $sql->execute($updates);
      } catch(Exception $e) {
        echo 'Exceção capturada:', $e->getMessage(), '\n';
      }
      
    }

    function delete($id) {
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = $id");
        $sql->execute();
    }
}



