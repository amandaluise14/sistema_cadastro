<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

$stmt = $conexao -> prepare (
    "UPDATE livros
    SET titulo = ?, autor = ?, ano = ?
    WHERE id = ?"
);

$stmt -> bind_param ("ssii", $titulo, $autor, %ano, $id);
$stmt -> execute();

header("Location: ../index.php");