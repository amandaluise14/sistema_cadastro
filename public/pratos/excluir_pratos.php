<?php
include "../../infra/conexao.php";

$id = $_GET["id"];

$stmt = $conexao->prepare(
    "DELETE FROM prato WHERE id = ?"
);

$stmt->bind_param("i", $id);

$stmt->execute();

header("Location: ../../index.php");
?>