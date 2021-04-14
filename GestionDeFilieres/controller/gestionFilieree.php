<?php

chdir('..');
include_once 'services/FiliereeService.php';
extract($_POST);

$ds = new FiliereeService();

if ($op != '') {
    if ($op == 'add') {
        $ds->create(new Filieree(0, $code, $libelle));
    } elseif ($op == 'update') {
        $ds->update(new Filieree($id, $code, $libelle));
    } elseif ($op == 'delete') {
        $ds->delete($ds->delete($id));
    }
}

header('Content-type: application/json');
echo json_encode($ds->findAll());