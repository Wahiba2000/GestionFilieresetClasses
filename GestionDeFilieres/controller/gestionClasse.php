<?php

chdir('..');
include_once 'services/ClasseService.php';
include_once 'services/FiliereeService.php';
extract($_POST);

$fs = new ClasseService();
$ls = new FiliereeService();

if ($op != '') {
    if ($op == 'add') {
        $a=$ls->findById($nom);
        $fs->create(new Classe(0, $code, $a));
    } elseif ($op == 'update') {
        $a=$ls->findById($nom);
        $fs->update(new Classe($id, $code, $a));
    } elseif ($op == 'delete') {
        $fs->delete($id);
    }
}

header('Content-type: application/json');
echo json_encode($fs->findAll());

