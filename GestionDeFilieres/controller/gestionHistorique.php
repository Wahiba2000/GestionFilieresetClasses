<?php

chdir('..');
include_once 'services/ClasseService.php';
extract($_POST);

$fs = new ClasseService();
if (isset($_POST['op'])) {
    if ($op == '') {
        header('Content-type: application/json');
        echo json_encode($fs->findFiliere());
    }
    elseif ($op == 'change' && $code_filiere=='Tous') {
        header('Content-type: application/json');
        echo json_encode($fs->findFiliere());
    }
    elseif ($op == 'change' && isset($_POST['code_filiere'])) {
        header('Content-type: application/json');
        echo json_encode($fs->findFiliere1($code_filiere));
    }
} else {
    header('Content-type: application/json');
    echo json_encode($fs->findFiliere());
}

