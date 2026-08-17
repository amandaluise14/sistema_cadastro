<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$stmt = $conexao-> prepare (
$stmt = $conexao->prepare(
    "INSERT INTO pratos (nome, descricao, preco, categoria) VALUES (?, ?, ?, ?)"
);

$stmt -> bind_param ("ssii", $nome, $descricao, $preco, $categoria);
$stmt -> execute();

)

header("Location: ../index.php");
?>