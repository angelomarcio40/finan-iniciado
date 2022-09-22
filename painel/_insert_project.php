<?php

include 'conexao/conexao.php';

$code = $_POST['code'];
$client = $_POST['client'];
$service = $_POST['service'];
$desc = $_POST['desc'];
$date = date('d-m-y');
$date2 = $_POST['date'];
$paytotal = $_POST['value'];
$npayments = $_POST['parc'];
$obs = $_POST['obs'];
$tasks = $_POST['tasks'];

$total = count($tasks);

for ($i=0; $i < $total; $i++) {
    $sql = "INSERT INTO tasks(code,task,status) VALUES ($code, '$tasks[$i]','pendente')";
    $query = mysqli_query($conexao,$sql);
}

$contract = $_FILES['contract'];

if($contract !== null) {

    preg_match("/\.(png|jpg|jpeg|pdf){1}$/i", $contract["name"], $ext);
    if ($ext == true) {

        // gera um nome aleatorio para a imagem 
        $nome_contract = md5(uniqid(time())) . "." . $ext[1];

        // seta o caminho onde o arquivo irá ficar 
        $caminho_contract = "images/" . $nome_contract;

        // move o arquivo para a pasta especifica 
         move_uploaded_file($contract["tmp_name"], $caminho_contract);

         $sql = "INSERT INTO `project`(`code`,`client`,`service`,`description`,`datestart`,`dateend`,`paytotal`,`npayments`,`obs`,contract) VALUES ($code,'$client','$service','$desc','$date','$date2','$paytotal',$npayments,'$obs','$nome_contract')";
         $inserir = mysqli_query($conexao,$sql);
    }
    

}

header('location: form_project.php?msg=1');


