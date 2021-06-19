<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="../css/styleRaiz.css">
    <link rel="stylesheet" href="../css/stylePacientes.css">
</head>
<body id="confirmaInsercao">
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="../conexao/home.html">Home</a>
    </header>
    <main>
        <h1>Cadastrar Paciente</h1>
        <div id="resultado">
            <div class="coluna">
            <?php
                include "../conexao/conexao.php"; 

                $nome = $_POST['userNome'];
                $tipoSang = $_POST['tipoSanguineo'];
                $cep = $_POST['userCEP'];
                $telefone = $_POST['userTel'];
                $dataNasc = $_POST['userDataNasc'];
                $iddoenca = $_POST['iddoenca'];
                $excluido = "false";

                function checaErro($telefone,$cep){
                    $error=false;
                    if($cep[5]!='-'){
                        $error=true;
                        echo "<script type='text/javascript'>alert('CEP digitado incorretamente! Verifique o campo.')</script>";
                    }
                    else if($telefone[0]!='(' || $telefone[3]!=')' || $telefone[10]!='-'){
                        $error=true;
                        echo "<script type='text/javascript'>alert('Formato de telefone inválido! Verifique o campo.')</script>";
                    }
                    return $error;
                }
                $erro = checaErro($telefone,$cep);
                if($erro!=false){
                    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=insere_paciente.php'>";
                }
                else { // Caso não haja erro na digitação dos campos...
                    $sql  = "INSERT INTO paciente VALUES (DEFAULT, '$nome', '$telefone', '$dataNasc', '$tipoSang', '$cep', $iddoenca, '$excluido');";
                    $resultado=pg_query($conecta,$sql);
                    $linhas=pg_affected_rows($resultado);

                    if ($linhas > 0)
                        echo "<p class=\"sucesso\">Paciente registrado no sistema!</p><br><br>";
                    else	
                        echo "<p class=\"aviso\">Erro no registo do paciente!</p><br> Tente novamente!<br>";
                }
                echo "<a class=\"retorna\" href=\"../paciente/insere_paciente.php\">Retornar</a>";

                pg_close($conecta);
            ?>
                
            </div>
        </div>
        
    </main>
</body>
</html>
