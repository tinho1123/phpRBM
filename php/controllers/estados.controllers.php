<?php

class StateContollers {
  private $service;
  function __construct($service) {
    $this->service = $service;
  }

    function create() {
        
        $this->service->create();
    }

    function read() {
      $result = $this->service->read();
      return $result;
    }

    function update(int $id, array $arr) {
        $this->service->update($id, $arr);
    }

    function delete($id) {
       $this->service->delete($id);
        
    }
}