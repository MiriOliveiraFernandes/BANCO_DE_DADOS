<?php
    try {
        $conectar = new PDO("sqlite:banco/banco_biblioteca.db");
        //echo "OK";
        $sql = $conectar->query("SELECT * FROM tb_livro");
        $tb_livro = $sql-> fetchAll(PDO::FETCH_ASSOC);

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
        <div class="cadastro-livro">
            <h2>Cadastro de Livros</h2>
            <form action="livros_cadastro.php" method="POST">
                <label for="titulo">Título</label>
                <input type="text" name= "titulo" id="titulo">

                <label for="autor">Autor</label>
                <input type="text" name= "autor" id="autor">

                <label for="editora">Editora</label>
                <input type="text" name= "editora" id="editora">

                <label for="ano_de_publicacao">Ano de Publicação</label>
                <input type="text" name= "ano_de_publicacao" id="ano_de_publicacao">

                <label for="quantidade">Quantidade</label>
                <input type="text" name= "quantidade" id="quantidade">

                <div class="botoes">
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Limpar">
                </div>

            </form>
        </div>
        <div class="consulta-livro">
            <h2>Consulta de livros</h2>
            <table>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Ano de Publicação</th>
                    <th>Quantidade</th>

                </tr>
                <?php
                for($i=0; $i < count($tb_livro); $i++){
                    echo "<tr>";
                    echo "<td id= 'td_centro'>".$tb_livro[$i]['titulo']."</td>";
                    echo "<td>". $tb_livro[$i]["autor"]."</td>";
                    echo "<td>". $tb_livro[$i]["editora"]."</td>";
                    echo "<td>". $tb_livro[$i]["ano_de_publicacao"]."</td>";
                    echo "<td>". $tb_livro[$i]["quantidade"]."</td>";
                    echo "<td id= 'tb_centro'>";
                    echo "<a href='#'>Visualizar</a>";
                    echo "<a href='#'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                } 
                ?>

            </table>
        </div>
    </main>
</body>
</html>

<?php
$conectar = null;
?>