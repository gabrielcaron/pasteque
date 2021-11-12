<?php
include '../App/Modeles/Livre.php';
var_dump('entre');
$model = new Livre();
$test = $model->trouverTout();
echo json_encode($test);