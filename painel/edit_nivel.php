<?php

include 'conexao/conexao.php';

$id = $_POST['id'];
$nivel = $_POST['nivel'];

$sql = "UPDATE usuario SET id_user_nivel = $nivel
WHERE id = $id";
$delete = mysqli_query($conexao, $sql);

header('Location: list_users.php?msg=1');
?>