<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];

$stmt = $conexao-> prepare (
$stmt = $conexao->prepare(
    "INSERT INTO usuario (nome, email) VALUES (?, ?)"
);

$stmt -> bind_param ("ss", $nome, $email);
$stmt -> execute();

)

header("Location: ../index.php");
?>