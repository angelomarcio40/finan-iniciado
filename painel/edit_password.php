<?php

include 'conexao/conexao.php';
include 'script/passwor.php';

$password = $_POST['password'];
$id = $_POST['id'];

$update = "UPDATE usuario SET password = sha1('$password') WHERE id = $id";

$att = mysqli_query($conexao,$update);

header('Location: profile.php?msg=1');




?>