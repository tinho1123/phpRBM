<?php

require_once('../../php/config/conecta_banco.php');
require_once('../../php/models/empresas.models.php');
require_once('../../php/services/empresas.services.php');
require_once('../../php/controllers/empresas.controllers.php');

$empresas = new EmpresasControllers(new EmpresasServices(new EmpresasModel(Database::connectDb())));