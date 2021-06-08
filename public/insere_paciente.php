<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="./css/styleRaiz.css">
    <link rel="stylesheet" href="./css/stylePacientes.css">
</head>
<body>
    <main>
        <h1>Cadastrar Paciente</h1>
        <div id="principal">
            <div class="coluna">
            <?php
                include "conexao.php"; 

                $nome = $_POST['userNome'];
                $tipoSang = $_POST['tipoSanguineo'];
                $cep = $_POST['userCEP'];
                $telefone = $_POST['userTel'];
                $dataNasc = $_POST['userDataNasc'];
                $doenca = 1;
                $excluido = "false";

                $sql  = "INSERT INTO paciente VALUES (DEFAULT, '$nome', '$telefone', '$dataNasc', '$tipoSang', '$cep', $doenca, $excluido);";
                
                $resultado=pg_query($conecta,$sql);
                $linhas=pg_affected_rows($resultado);

                if ($linhas > 0)
                    echo "<p class=\"aviso\">Paciente registrado no sistema!</p><br><br>";
                else	
                    echo "<p class=\"aviso\">Erro no registo do paceinte!</p><br> Tente novamente!<br>";
                // Fecha a conexão com o PostgreSQL

                pg_close($conecta);
                echo "<p class=\"aviso\">A conexão com o banco de dados foi encerrada!</p>"
            ?>
                
            </div>
            <!-- <div class="coluna">
                Nome <input type="text" name="" id="">
                CPF <input type="text" name="" id="">
                Telefone <input type="tel" name="" id="">
                Data de Nascimento <input type="date" name="" id="">
                Sexo <input type="radio" name="" id="">
            </div> -->
        </div>
        
    </main>
</body>
</html>
