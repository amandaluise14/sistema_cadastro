<?php

include "../infra/conexao.php";

$id = $_GET["id"];
$sql = "SELECT * FROM livros WHERE id = $id";
$resultado = mysqli_query($conexao, $sql );

$livro =mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Prato</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>
    <header>
        <h1>CRUD - Livraria</h1>
    </header>
    <main>
        <h2>Editando o prato <?php echo $livro["nome"]?>!</h2>
        <form action="atualizar_pratos.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $livro["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $livro["nome"]?>">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" value="<?php echo $livro["descricao"]?>">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco" value="<?php echo $livro["preco"]?>">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" value="<?php echo $livro["categoria"]?>">
            <br>
            <button type="submit">Atualizar</button>
        </form>

    </main>
    <footer>

    </footer>


</body>

</html>