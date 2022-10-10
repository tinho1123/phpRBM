<?php

Class UsersService {
     private $model;

    function __construct($model)
    {
        $this->model = $model;
    }

    function login($email, $senha) {
      $result = $this->model->login($email);
      if(isset($result[0]) && $result[0]->senha == $senha) {
        $log_acesso = $this->model->log_acesso($result[0]->id);
        return $result[0];
      }
      return null;
    }

    function create($nome, $email ,$senha,$fk_empresa ,$fk_nivel_acesso) {
        
      $result = $this->model->create($nome, $email ,$senha,$fk_empresa ,$fk_nivel_acesso);
      return $result; 
    }

    function read() {
      $result = $this->model->read();
      return $result;
    }

    function update(int $id, array $arr) {
     $result = $this->model->update($id, $arr);
      return $result;
    }

    function delete($id) {
        $result = $this->model->delete($id);
        return $result;
    }
}



