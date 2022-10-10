<?php

require_once('../../php/config/conecta_banco.php');
require_once('../../php/models/estados.models.php');
require_once('../../php/services/estados.services.php');
require_once('../../php/controllers/estados.controllers.php');

$estados = new StateContollers(new StatesServices(new StatesModel(Database::connectDb())));