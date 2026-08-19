<?php

include "../../infra/conexao.php";

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];
$usuario_id = $_POST["usuario_id"];

$stmt = $conexao->prepare(
    "INSERT INTO prato (nome, descricao, preco, categoria, usuario_id) VALUES (?, ?, ?, ?, ?)"
);

$stmt -> bind_param ("ssis", $nome, $descricao, $preco, $categoria, $usuario_id);
$stmt -> execute();


header("Location: ../index.php");
?>