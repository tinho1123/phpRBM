<?php

Class UsersControllers {
     private $service;

    function __construct($service)
    {
        $this->service = $service;
    }

    function login($email, $senha) {
      $result = $this->service->login($email, $senha);
      return $result;
    }

    function create($nome, $email ,$senha,$fk_empresa ,$fk_nivel_acesso) {
        
      $result = $this->service->create($nome, $email ,$senha,$fk_empresa ,$fk_nivel_acesso);
      return $result; 
    }

    function read() {
      $result = $this->service->read();
      return $result;
    }

    function update(int $id, array $arr) {
     $result = $this->service->update($id, $arr);
      return $result;
    }

    function delete($id) {
        $result = $this->service->delete($id);
        return $result;
    }
}



