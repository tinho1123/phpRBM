<?php


Class StatesModel {
     private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    function create(string $nome, string $uf) {
        
        $sql = $this->db->prepare("INSERT INTO estados(nome, uf) 
        value ('$nome','$uf')");
        return $sql->execute();
    }

    function read() {
        $sql = $this->db->prepare('SELECT * FROM estados');
        $sql->execute();
        $consulta = $sql->fetchAll(PDO::FETCH_OBJ);
        return $consulta;
    }

    function update(int $id, array $arr) {
        try{
            $updates = array_filter($arr, function ($value) {
                return $value !== null;
            });
            $query = 'UPDATE rup SET';
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
        $sql = $this->db->prepare("DELETE FROM estados where id = $id");
        $sql->execute();
    }
}



