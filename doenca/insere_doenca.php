<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de Doenças</title>
    <link rel="stylesheet" href="../css/styleRaiz.css">
    <link rel="stylesheet" href="../css/styleDoencas.css">
    
</head>
<body>
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="../conexao/home.html">Home</a>
    </header>
    <main>
        <h1>Inserir Doenças</h1> <br> <br>
        <div id="principal" style="height: 200px;">
            <div class="coluna">
            <?php
                include "../conexao/conexao.php"; 

                $nomePop = $_POST['nomePopular'];
                $cura = $_POST['temCura'];
                $nomeCient = $_POST['nomeCientifico'];
                $sintomas = $_POST['sintomas'];
                $excluido = "false";

                $sql  = "INSERT INTO doenca VALUES (DEFAULT, '$nomePop', $cura, '$nomeCient', '$sintomas', $excluido);";
                
                $resultado=pg_query($conecta,$sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                    echo "<p class=\"sucesso\">Doença registrada!</p><br><br>";
                else	
                    echo "<p class=\"aviso\">Erro na gravação da doença!</p><br><br>";

                echo "<a class=\"retorna\" href=\"insere_doenca.html\">Retornar</a>";
                
                pg_close($conecta);
            ?>  
                
            </div>
        </div>
        
    </main>
</body>
</html>