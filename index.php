<?php

include "infra/conexao.php";
$sql = "SELECT * FROM prato";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Anamandas</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <h1> Restaurante Anamandas </h1>
    </header>
    <main>
        <h2>Adicione um novo prato!</h2>
        <form action="public/pratos/cadastrar_pratos.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome">
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao">
            <br>
            <label for="preco">Preço:</label>
            <input type="number" name="preco">
            <br>
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria">
            <br>
            <label for="id_cliente">Cliente:</label>
            <select name="id_cliente">
                <option value="1">Selecione</option>

                <?php
                
                $sql = "SELECT * FROM usuario";
                $usuarios = mysqli_query($conexao,$sql);

                while ($usuarios = mysqli_fetch_assoc($usuario)) { ?>

                <option value=" <?php echo $usuario["id"] ?>  "> 
                <?php echo $usuario["nome"] ?> </option>

                <?php }; ?>

            
            </select>
            <br>
            <button type="submit">Cadastrar</button>
        </form>
        <div>
            <h2>Pratos Cadastrados</h2>
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                </tr>
                <?php while ($pratos = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $pratos["nome"] ?></td>
                        <td><?php echo $pratos["descricao"] ?></td>
                        <td><?php echo $pratos["preco"] ?></td>
                        <td><?php echo $pratos["categoria"] ?></td>
                        <td>
                            <a href="public/editar.php?id=<?php echo $pratos["id"] ?>">Editar</a>
                            <a href="public/excluir.php?id=<?php echo $pratos["id"] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>                                           
                
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>-
                </tr>
                <?php while ($usuarios = mysqli_fetch_assoc($usuario)) {?>
                
                        <tr>
                            <td><?php echo $usuario["id"] ?></td>
                            <td><?php echo $usuario["Nome"] ?></td>
                            <td><?php echo $usuario["Email"] ?></td>
                        </tr>
                  <?php } ?> 
                    

         </div>

        <div>
            <h2>Adicione um novo usuário!</h2>
            <form style="padding: 0px;" action="public/usuario/cadastrar_usuario.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" name="nome">
                <br>
                <label for="descricao">Email:</label>
                <input type="text" name="email">
                <br>
                <button type="submit">Cadastrar</button>

    </main>
    <footer>
    </footer>


</body>

</html>