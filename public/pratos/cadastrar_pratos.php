<?php

include "../../infra/conexao.php";

$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$categoria = $_POST["categoria"];

$stmt = $conexao->prepare(
    "INSERT INTO prato (nome, descricao, preco, categoria) VALUES (?, ?, ?, ?)"
);

$stmt -> bind_param ("ssis", $nome, $descricao, $preco, $categoria);
$stmt -> execute();


header("Location: ../../pagina_prato.php");
?>