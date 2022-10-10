<?php
Class StatesServices {
  private $model;
  function __construct($model) {
    $this->model = $model;
  }

    function create(string $nome, string $uf) {
        
         $this->model->create($nome, $uf);
        
    }

    function read() {
      $result = $this->model->read();
      return $result;
    }

    function update(int $id, array $arr) {
        $this->model->update($id, $arr);
        
    }

    function delete($id) {
      $this->model->delete($id);
        
    }


}