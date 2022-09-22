<?php
session_start();

$mailHeader = $_SESSION['mailx'];

if(!isset($_SESSION['mailx'])) {
    header('Location: ../index.php');
}


include 'conexao/conexao.php';
$sql = "select * from usuario where mail = '$mailHeader'";
$search = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($search);

$id = $array['id'];
$name= $array['name'];
$cnpj = $array['cnpj'];
$itel = $array['tel'];
$nivelUser= $array['id_user_nivel'];





?>