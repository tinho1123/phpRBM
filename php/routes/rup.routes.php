<?php

require_once('../../php/config/conecta_banco.php');
require_once('../../php/models/rup.models.php');
require_once('../../php/services/rup.services.php');
require_once('../../php/controllers/rup.controllers.php');

$rups = new RupControllers(new RupServices(new RupModel(Database::connectDb())));