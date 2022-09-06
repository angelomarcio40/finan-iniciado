<?php

include './conexao/conexao.php';
// include './script/password.php';

$mail = $_POST['mail'];
$password = $_POST['password'];
$nivel = 3;

$sql = "SELECT * FROM usuario where- mail = '$mail'";
$search = mysqli_query($conexao,$sql);

$ztotal = mysqli_num_rows($search); //contar quantas linhas temos

if($total > 0) {
    header('Location: ../index.php?msg-3'); //mensagem de retorno
} else {

    $sql = "INSERT INTO usuario (mail,passowrd,id_user_nivel)
    values ('$mail', shal('password'),$nivel)";
    $insert = mysqli_query($conexao, $sql);

    header('Location: form_user.php?msg-1');
}
?>