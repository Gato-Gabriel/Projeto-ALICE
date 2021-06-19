<html>
<head>
    <title>Alterar Paciente</title>
    <link rel="stylesheet" href="../css/stylePacientes.css">
    <link rel="stylesheet" href="../css/styleRaiz.css">
</head>
<body id="altera">
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="../conexao/home.html">Home</a>
    </header>
    <?php
        include "../conexao/conexao.php";
        //dados enviados do script altera_prod.php
        $idpaciente = $_GET["idpaciente"];
        $sql="SELECT * FROM paciente WHERE idpaciente = $idpaciente;";
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_num_rows($resultado);
        if ( $qtde == 0 ){
            echo "<a class=\"aviso\">Paciente nao encontrado  !!!</a><br><br>";
            exit;
        }
        $linha = pg_fetch_array($resultado);
    ?>
    <main>
    <h1>Alteração de Pacientes</h1>    
    <form action="grava_alteracao_paciente.php" method="post">
        <label>ID do paciente</label> <input type="text" name="idpaciente" 
        value="<?php echo $linha[0]; ?>" readonly><br>
        <label>Nome do paciente</label> <input type="text" name="nome_paciente" 
        value="<?php echo $linha[1]; ?>" maxlength="50"><br>
        <label>Telefone</label> <input type="text" name="telefone" 
        value="<?php echo $linha[2]; ?>" maxlength="16"><br>
        <label>Data de nascimento</label> <input type="date" name="data_nascimento" 
        value="<?php echo $linha[3]; ?>" ><br>
        <label>Sangue</label>
        <select name="tipoSanguineo" value="<?php echo $linha[4]; ?>">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select> <br>
        <label>CEP</label> <input type="text" name="cep" 
        value="<?php echo $linha[5]; ?>" size="9" maxlength="9"><br>
        <label>Nome da Doenca</label>
        <select name="iddoenca" value="<?php echo $linha[6]; ?>">
            <?php
                $sqlDoencas="SELECT nome_popular, iddoenca FROM doenca WHERE excluido='false';";
                $resultadoDoencas=pg_query($conecta,$sqlDoencas);
                $qtdeDoencas=pg_num_rows($resultadoDoencas);
                if($qtdeDoencas==0) echo "<p class=\"aviso\">Sem doenças registradas! Tente novamente mais tarde.</p>";
                for ($cont=0; $cont < $qtdeDoencas; $cont++) {
                    $selecionado = "";
                    $linhaDoencas=pg_fetch_array($resultadoDoencas);
                    if($linhaDoencas['iddoenca']==$linha[6]) $selecionado = "selected";  // Faz com que a doença do paciente esteja selecionada
                    echo "<option value=\"".$linhaDoencas['iddoenca']."\" $selecionado>".$linhaDoencas['nome_popular']."</option>";
                }
            ?>
        </select>
        <br>
        <input type="submit" value="Gravar">
    </form>
    <a class="retorna" href="./mostra_pacientes.php">Retornar</a>
    </main>
</body>
    
</html>

