<?php


Class EmpresasModel {
     private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function create($razao_social,$fundacao,$email) {
        
      $sql = $this->db->prepare("INSERT INTO empresas(razao_social,fundacao,email) 
      values ($razao_social,$fundacao,$email)");
      $sql->execute();
    }

    function readOne($id) {
      $sql = $this->db->prepare("SELECT * FROM empresas WHERE id='$id'");
      $sql->execute();
      $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
      return $consulta;
    }

    function read() {
      $sql = $this->db->prepare('SELECT * FROM empresas');
      $sql->execute();
      $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
      return $consulta;
    }

    function update(int $id, array $arr) {
      try {
        
        $query = 'UPDATE empresas SET';
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

    function delete($id) {
        $sql = $this->db->prepare("DELETE FROM empresas WHERE id = '$id'");
        $sql->execute();
    }
}



