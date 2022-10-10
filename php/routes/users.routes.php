<?php

require_once('../../php/config/conecta_banco.php');
require_once('../../php/models/usuarios.models.php');
require_once('../../php/services/usuarios.services.php');
require_once('../../php/controllers/usuarios.controllers.php');

$usuarios = new UsersControllers(new UsersService(new UsersModel(Database::connectDb())));