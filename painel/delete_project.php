<?php
include 'conexao/conexao.php';

$code = $_POST['code'];

$sql = "DELETE FROM project WHERE code = $code";
$delet = mysqli_query($conexao,$sql);


header('location: list_projects.php?code='.$code);

?>