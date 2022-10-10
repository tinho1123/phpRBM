<?php
require_once('../../php/utils/formatDate.php');

Class RupServices {
  private $model;
  function __construct($model) {
    $this->model = $model;
  }

    function create($cpf_cnpj, $nome ,$nascimento,$sexo ,$email , $message) {
        
      $formatDateDB = FormatDate::formatUTCToDB($nascimento);

       $this->model->create($cpf_cnpj, $nome ,$formatDateDB,$sexo ,$email , $message);
    }

    function read() {
      $result = $this->model->read();
      return $result;
    }

    function readOne($cpf_cnpj) {
      $result = $this->model->readOne($cpf_cnpj);
      return $result[0];
    }

    function update(string $id, array $arr) {
        $idNumber = (int)$id;
        $updates = array_filter($arr, function ($value) {
          return $value !== null;
       });
        $this->model->update($idNumber, $updates);
        
    }

    function delete($cpf_cnpj) {
        $this->model->delete($cpf_cnpj);
    }


}