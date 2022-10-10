<?php

Class RupControllers {
  private $service;
  function __construct($service) {
    $this->service = $service;
  }

    public function create() {
      $cpf_cnpj = $_POST['cpfcnpj'];
      $nome = $_POST['name'];
      $nascimento = $_POST['nascimento'];
      $sexo = $_POST['sexo'];
      $email = $_POST['email'];
      $message = $_POST['message'];
        
      $this->service->create($cpf_cnpj, $nome ,$nascimento,$sexo ,$email , $message);

    }

    public function read() {
      $result = $this->service->read();
      return $result;
    }

    public function readOne() {
      $cpf_cnpj = $_POST['editar']; 

      $result = $this->service->readOne($cpf_cnpj);
      return $result;
    }

    public function update() {
      $id = $_POST['enviar_edit'];
      array_pop($_POST);
        $this->service->update($id, $_POST); 
    }

    public function delete() {
      $cpf_cnpj = $_POST['excluir'];

      $this->service->delete($cpf_cnpj);
    }

}