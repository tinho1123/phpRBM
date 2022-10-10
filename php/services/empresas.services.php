<?php
require_once('../../php/utils/formatDate.php');

Class EmpresasServices {
  private $model;
  function __construct($model) {
    $this->model = $model;
  }

    function create($razao_social,$fundacao,$email) {
        
      $formatDateDB = FormatDate::formatUTCToDB($fundacao);

       $this->model->create($razao_social,$formatDateDB,$email);
    }

    function read() {
      $result = $this->model->read();
      return $result;
    }

    function readOne($id) {
      $result = $this->model->readOne($id);
      return $result[0];
    }

    function update(string $id, array $arr) {
        $idNumber = (int)$id;
        $updates = array_filter($arr, function ($value) {
          return $value !== null;
       });
        $this->model->update($idNumber, $updates);
        
    }

    function delete($id) {
        $this->model->delete($id);
    }


}