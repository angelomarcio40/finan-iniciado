<?php
    session_start();
include './painel/conexao/conexao.php';
Include './painel/script/password.php';

$mail = $_POST['mail'];
$password = $_POST['password']; // client

$sql = "SELECT * FROM usuario WHERE mail = '$mail'";
$search = mysqli_query($conexao,$sql);
$array = mysqli_fetch_array($search);

$passowrdBase = $array['password']; // database

$passwordEnc = sha1($password); //encriptando password client


if($passwordEnc == $passwordBase) {

    $_SESSION['mailx'] = $mail;
    header('Location: ./index.php');
} else {
    header('Location: index.php?msg2');
}
?>