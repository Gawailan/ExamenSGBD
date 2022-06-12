<?php
require_once("autoload.php");

$entity = false;
$action = false;
if (isset($_POST) && !empty($_POST)) {
    $entity = isset($_POST['entity']) ? $_POST['entity'] : false;
    $action = isset($_POST['action']) ? $_POST['action'] : false;
    if (!$entity) {
        
        return false;
    }
    
    $controller_name = ucfirst($entity)."Controller";
    $controller = new $controller_name();
    
    if (!$action || $action == "store") {
        return $controller->store($_POST);
    }
    
    if ($action == "update") {
        if (!empty($_POST['id'])) {
            return $controller->update($_POST['id'], $_POST);
        }
        
    }
    
    if ($action == "destroy") {
        if (!empty($_POST['id'])) {
            return $controller->destroy($_POST['id']);
        }
    }
}

if (isset($_GET) && !empty($_GET)) {
    $entity = isset($_GET['entity']) ? $_GET['entity'] : false;
    $action = isset($_GET['action']) ? $_GET['action'] : false;
    
    if (!$entity) {
        (new PersonController)->index();
        return true;
    }
    $controller_name = ucfirst($entity)."Controller";
    $controller = new $controller_name();
    
    if (!$action) {
        if (!empty($_GET['id'])) {
            return $controller->show($_GET['id']);
        }
        return $controller->index();
    }
    
    if ($action == "create") {
        return $controller->create();
    }
    
    if ($action == "edit") {
        return $controller->edit($_GET['id']);
    }
}

(new PersonController)->index();
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Test</p>
</body>
</html> -->