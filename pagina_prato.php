<?php

include "infra/conexao.php";

$usuarios = mysqli_query(
    $conexao,
    "SELECT * FROM usuario"
);

$pratos = mysqli_query(
    $conexao,
    "SELECT prato.*, usuario.nome AS usuario_nome
     FROM prato
     INNER JOIN usuario
     ON prato.usuario_id = usuario.id"
);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Restaurante Anamandas - Pratos</title>

    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <header>
        <h1>Restaurante Anamandas</h1>
    </header>

    <main>
        <h2>Cadastro de Pratos</h2>

        <form action="cadastrar_prato.php" method="POST">

            <label for="nome"> Nome do prato: </label>
            <input type="text" name="nome" id="nome" required >
            <br>

            <label for="descricao"> Descrição: </label>

            <input type="text" name="descricao" id="descricao" >
            <br>

            <label for="preco"> Preço: </label>

            <input type="number" name="preco" id="preco" step="0.01" required>
            <br>


            <label for="usuario_id">
                Usuário responsável:
            </label>

            <select
                name="usuario_id"
                id="usuario_id"
                required
            >

                <option value="">
                    Selecione um usuário
                </option>


                <?php while ($usuario = mysqli_fetch_assoc($usuarios)) { ?>
                    <option value="<?php echo $usuario["id"]; ?>">
                        <?php echo $usuario["nome"]; ?>
                    </option>
                <?php } ?>

            </select>

            <br><br>
        <button type="submit">Cadastrar prato</button>

        </form>
        <div>

            <h2>Pratos cadastrados</h2>

        <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Usuário</th>
                </tr>

                <?php while ($prato = mysqli_fetch_assoc($pratos)) { ?>

                    <tr>
                        <td> <?php echo $prato["id"]; ?> </td>
                        <td> <?php echo $prato["nome"]; ?></td>
                        <td> <?php echo $prato["descricao"]; ?> </td>
                        <td> R$ <?php echo $prato["preco"]; ?> </td>
                        <td> <?php echo $prato["usuario_nome"]; ?> </td>
                    </tr>

                <?php } ?>

            </table>
        </div>
        <br>
        <a href="index.php">Voltar para o início</a>

    </main>


    <footer>

    </footer>

</body>

</html>