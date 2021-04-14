
<?php

chdir('..');
include_once 'services/FonctionService.php';
extract($_POST);



header('Content-type: application/json');
echo json_encode($ds->findAll());
