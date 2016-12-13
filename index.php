<?php

include_once('csrfFilter.php');

include_once('includes/appModel.php');
include_once('includes/appController.php');
include_once('includes/appView.php');

$db = new appModel();
$controller = new appController($db);
$view = new appView($db, $token);

$action = '';

if (isset($_POST['token']) && $_POST['token'] === $_SESSION['token']) {
    $controller->insertContact($_POST['nameField'], $_POST['emailField']);
} elseif (isset($_GET['action'])) {
    $action = $_GET['action'];
}

echo $view->output($action);