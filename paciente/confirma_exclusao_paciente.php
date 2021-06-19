<html>
    <head>
        <link rel="stylesheet" href="../css/stylePacientes.css">
        <link rel="stylesheet" href="../css/styleRaiz.css">
        <title>Exclusão de Doenças</title>
    </head>
<body id="confirmaExclusao">
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="../conexao/home.html">Home</a>
    </header>
    <?php
        include "../conexao/conexao.php";
        //dados enviados do script exclui_prod.php
        $idpaciente = $_GET["idpaciente"];
        $sql="SELECT * FROM paciente WHERE idpaciente = $idpaciente;";
        $resultado=pg_query($conecta,$sql);
        $qtde=pg_num_rows($resultado);
        if ( $qtde == 0 ){echo "Registro nao encontrado  !!!<br><br>";exit;}
        $linha = pg_fetch_row($resultado);
    ?>
    <main>
    <h1>Exclusão de Pacientes</h1>   
    <form action="exclusao_logica_paciente.php" method="post">
        ID do paciente <input type="text" name="idpaciente" 
        value="<?php echo $linha[0]; ?>" size="5" readonly><br>
        Nome do paciente <input type="text" name="nome_paciente" 
        value="<?php echo $linha[1]; ?>" readonly><br>
        Telefone <input type="text" name="telefone" 
        value="<?php echo $linha[2]; ?>" size="14" readonly><br>
        Data de nascimento <input type="text" name="data_nascimento" 
        value="<?php echo $linha[3]; ?>" size="11" readonly><br>
        Sangue <input type="text" name="sangue" 
        value="<?php echo $linha[4]; ?>" size="3" readonly><br>
        CEP <input type="text" name="cep" 
        value="<?php echo $linha[5]; ?>" size="10" readonly><br>
        <?php
        $sqlDoencas="SELECT iddoenca,nome_popular FROM doenca WHERE excluido='false'";
        $resultadoDoencas= pg_query($conecta, $sqlDoencas);
        $qtdeDoencas=pg_num_rows($resultadoDoencas);
        for($te=0;$te<$qtdeDoencas;$te++){
            $linhaD=pg_fetch_array($resultadoDoencas);
            if($linhaD['iddoenca']==$linha[6])
                $doencaNome = $linhaD['nome_popular'];
        }
        ?>
        Nome da Doença <input type="text" name="iddoenca" 
        value="<?php echo $doencaNome; ?>" readonly><br>
        <input type="submit" value="Confirma exclusão">	<br>
    </form>
    <a class="retorna" href="./mostra_pacientes.php">Retornar</a>
    </main>
    
</body>
</html>
