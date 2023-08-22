<?php
    try {
        $conectar = new PDO("sqlite:banco/banco_biblioteca.db");
        //echo "OK";
        $sql = $conectar ->query("SELECT * FROM tb_usuario");
        $tb_usuario = $sql -> fetchAll(PDO::FETCH_ASSOC);

       /*  for($i=0; $i < count($tb_usuario); $i++){
            echo "Matricula: ". $tb_usuario[$i]["matricula"];
            echo "Nome: ". $tb_usuario[$i]["nome"];
            echo "Telefone: ". $tb_usuario[$i]["telefone"];
            echo "<br>";

        } */


    } catch (\Throwable $th) {
        echo "não OK";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Biblioteca Municipal</title>
</head>
<body>
<header>
   
   <img src="./img/Biblioteca-Banner.png" alt="Biblioteca-Banner">
   <nav>
       <ul>
           <li><a href="index.php">Início</a></li>
           <li><a href="usuarios.php">Usuários</a></li>
           <li><a href="livros.php">Livros</a></li>
           <li><a href="#">Empréstismos</a></li>
       </ul>
   </nav>


</header>

    <main>
        <div class="cadastro">
            <h2>Cadastro do Usuário</h2>
            <form action="usuarios_cadastro.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" name= "nome" id="nome">

                <label for="telefone">Telefone</label>
                <input type="telefone" name= "telefone" id="telefone">

                <label for="rua">Rua</label>
                <input type="rua" name= "rua" id="rua">

                <label for="numero">Numero</label>
                <input type="numero" name= "numero" id="numero">

                <label for="cep">CEP</label>
                <input type="cep" name= "cep" id="cep">

                <label for="complemento">Complemento</label>
                <input type="complemento" name= "complemento" id="complemento">

                <label for="bairro">Bairro</label>
                <input type="bairro" name= "bairro" id="bairro">

                <label for="cidade">Cidade</label>
                <input type="cidade" name= "cidade" id="cidade">

                <label for="estado">Estado</label>
                <input type="estado" name= "estado" id="estado">

                <div class="botoes">
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Limpar">
                </div>

            </form>
        </div>
        <div class="consulta">
            <h2>Consulta de usuários</h2>
            <table>
                <tr>
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Opções</th>
                </tr>
                <?php
                for($i=0; $i < count($tb_usuario); $i++){
                    echo "<tr>";
                    echo "<td>". $tb_usuario[$i]["matricula"]."</td>";
                    echo "<td>". $tb_usuario[$i]["nome"]."</td>";
                    echo "<td>". $tb_usuario[$i]["telefone"]."</td>";
                    echo "<td> <a href='#'>Visualizar</a> <a href='#'>Excluir</a></td>";
                    echo "</tr>";
                } 
                ?>

            </table>
        </div>
    </main>
</body>
</html>