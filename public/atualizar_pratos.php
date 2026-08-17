<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$stmt = $conexao -> prepare (
    "UPDATE pratos
    SET nome = ?, descricao = ?, preco = ?, categoria = ?
    WHERE id = ?"
);

$stmt -> bind_param ("ssii", $nome, $descricao, $preco, $categoria, $id);
$stmt -> execute();

header("Location: ../index.php");