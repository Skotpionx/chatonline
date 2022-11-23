<?php

//cargamos el modelo
require_once('models/userModel.php');
require_once('models/userRepository.php');
require_once('models/messageModel.php');
require_once('models/messageRepository.php');
$roomMessages = MessageRepository::getRoomMessages(1);
session_start();


if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $datos['rol']=0;
    $datos['email']="";
    $datos['birthday']="";
    $datos['vip']=0;
    $datos['activated']=1;
    $datos['password']="";
    $datos['img']="";
    $datos['status']=0;
    $_SESSION['user'] = new User($datos);
}

if(isset($_GET['panelAdmin'])) {
    require_once('controllers/adminController.php');
    die();
}
if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    $datos['id']=0;
    $_SESSION['user'] = new User($datos);
}
if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}
if(isset($_GET['PRUEBA'])) {
    require_once('views/chat_app.html');
    die();
}
if(isset($_POST['send'])){
    require_once('controllers/messageController.php');
    $roomMessages = MessageRepository::getRoomMessages(1);
    die();
}
// cargar la vista
require_once("views/mainView.phtml");
?>