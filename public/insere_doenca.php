<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/styleRaiz.css">
    <link rel="stylesheet" href="./css/styleDoencas.css">
    
</head>
<body>
    <main>
        <h1>Inserir Doenças</h1> <br> <br>
        <div id="principal">
            <div class="coluna">
            <?php
                include "conexao.php"; 

                $nomePop = $_POST['nomePopular'];
                $cura = $_POST['temCura'];
                $nomeCient = $_POST['nomeCientifico'];
                $sintomas = $_POST['sintomas'];
                $excluido = "false";

                $sql  = "INSERT INTO doenca VALUES (DEFAULT, '$nomePop', $cura, '$nomeCient', '$sintomas', $excluido);";
                
                $resultado=pg_query($conecta,$sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                    echo "<p class=\"aviso\">Doença registrada!</p><br><br>";
                else	
                    echo "<p class=\"aviso\">Erro na gravação da doença!</p><br><br>";
                // Fecha a conexão com o PostgreSQL

                pg_close($conecta);
            ?>  
                
            </div>
        </div>
        
    </main>
</body>
</html>