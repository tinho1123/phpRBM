<?php

Class EmpresasControllers {
  private $service;
  function __construct($service) {
    $this->service = $service;
  }

    public function create() {
   
      $razao_social = $_POST['razao_social'];
      $fundacao = $_POST['fundacao'];
      $email = $_POST['email'];
     
        
      $this->service->create($razao_social, $fundacao ,$email);

    }

    public function read() {
      $result = $this->service->read();
      return $result;
    }

    public function readOne() {
      $id = $_POST['editar']; 

      $result = $this->service->readOne($id);
      return $result;
    }

    public function update() {
      $id = $_POST['enviar_edit'];
      array_pop($_POST);
        $this->service->update($id, $_POST); 
    }

    public function delete() {
      $id = $_POST['excluir'];

      $this->service->delete($id);
    }

}