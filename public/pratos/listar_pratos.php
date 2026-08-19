<?php

include "infra/conexao.php";

$usuarios = mysqli_query($conexao, "SELECT * FROM usuario");

$resultado = null;

if (isset($_GET["usuario_id"]) && $_GET["usuario_id"] != "") {

    $usuario_id = $_GET["usuario_id"];

    $sql = "SELECT prato.*, usuario.nome AS usuario_nome
            FROM prato
            INNER JOIN usuarios ON prato.usuario_id = usuario.id
            WHERE prato.usuario_id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("i", $usuario_id);

    $stmt->execute();

    $resultado = $stmt->get_result();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratos por Usuário</title>
    <link rel="stylesheet" href="style/listar_usuario.css">
</head>

<body class="listar-usuario">

    <header>
        <h1>Restaurante Anamandas</h1>
    </header>

    <main>

        <h2>Pratos por Usuário</h2>

        <form method="GET">

            <label for="usuario_id">Escolha o usuário:</label>

            <select name="usuario_id" id="usuario_id">

                <option value="">Selecione um usuário</option>

                <?php while ($usuarios = mysqli_fetch_assoc($usuario)) { ?>

                    <option value="<?php echo $usuario["id"]; ?>">
                        <?php echo $usuario["nome"]; ?>
                    </option>

                <?php } ?>

            </select>

            <button type="submit">Pesquisar</button>

        </form>

        <?php if ($resultado != null) { ?>

          <h2>Pratos cadastrados</h2>

            <table>

                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Cadastrado por</th>
                </tr>

                <?php while ($prato = $resultado->fetch_assoc()) { ?>

                    <tr>

                        <td><?php echo $prato["nome"]; ?></td>

                        <td><?php echo $prato["descricao"]; ?></td>

                        <td><?php echo $prato["preco"]; ?></td>

                        <td><?php echo $prato["categoria"]; ?></td>

                        <td><?php echo $prato["usuario_nome"]; ?></td>

                    </tr>

                <?php } ?>

            </table>

        <?php } ?>

    </main>

</body>

</html>