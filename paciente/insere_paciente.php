<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="../css/styleRaiz.css">
    <link rel="stylesheet" href="../css/stylePacientes.css">
</head>
<body>
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="../conexao/home.html">Home</a>
    </header>
    <main>
        <h1 id="h1Cadastro">Cadastrar Paciente</h1>
        <div id="principal">
            <div class="coluna">
                <form action="./confirma_insere_paciente.php" method="post">
                    <label>Nome do paciente</label><input type="text" name="userNome" maxlength="50" required> <br>
                    <label>CEP do paciente</label><input type="text" name="userCEP" maxlength="9" required> <br>
                    <label>Telefone</label> <input type="text" name="userTel" value="(**) *****-****" maxlength="15" required> <br>
                    <label>Data de Nascimento</label> <input type="date" name="userDataNasc" value="<?php echo date('d-m-Y'); ?>"> <br>
                    <label>Tipo Sanguíneo</label>
                    <select name="tipoSanguineo">
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select> <br>
                    <label>Doença</label>
                    <select name="iddoenca">
                        <?php
                            include "../conexao/conexao.php";
                            $sql="SELECT nome_popular, iddoenca FROM doenca WHERE excluido='false';";
                            $resultado=pg_query($conecta,$sql);
                            $qtde=pg_num_rows($resultado);
                            if($qtde==0) echo "<p class=\"aviso\">Sem doenças registradas! Tente novamente mais tarde.</p>";
                            for ($cont=0; $cont < $qtde; $cont++) {
                                $linha=pg_fetch_array($resultado);
                                echo "<option value=\"".$linha['iddoenca']."\">".$linha['nome_popular']."</option>";
                            }
                        ?> 

                    </select> <br> <br>
                    
                    <input type="submit" value="Cadastrar" style="font-size: 17px;">
                </form>
                
            </div>
        </div>
        
    </main>
</body>
</html>