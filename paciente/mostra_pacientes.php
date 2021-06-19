<html>
<head>
    <link rel="stylesheet" href="../css/stylePacientes.css">
    <title>Registro de Pacientes</title>
</head>
</html>
<body>
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="../conexao/home.html">Home</a>
    </header>    
<?php
    include "../conexao/conexao.php";

    $nomePac = $_POST['pacNome'];
    $sql="SELECT * FROM paciente WHERE excluido='false' ORDER BY idpaciente";
    $resultado= pg_query($conecta, $sql);
    $qtde=pg_num_rows($resultado);

    if ($qtde > 0) {
        echo "<main id=\"pesquisa\">";
        echo "<h1>Registro de Pacientes</h1>";
        
        echo "<table border='1'>";
        echo "<tr>";
            echo "<td width='50px' height='25px'>"."&nbsp;&nbsp;&nbsp;ID"."</td>";
            echo "<td width='210px' height='25px'>"."Nome"."</td>";
            echo "<td width='100px' height='25px'>"."Telefone"."</td>";
            echo "<td width='60px' height='25px'>"."Data de Nascimento"."</td>";
            echo "<td width='55px' height='25px'>"."&nbsp;Tipo &nbsp;Sang."."</td>";
            echo "<td width='80px' height='25px'>"."CEP"."</td>";
            echo "<td width='130px' height='25px'>"."Doença"."</td>";
        echo"</tr>";
        
        for ($cont=0; $cont < $qtde; $cont++) {
            $linha=pg_fetch_array($resultado);
            
            echo "<tr>"; 
                echo "<td>".$linha['idpaciente']."</td>";
                echo "<td>".$linha['nome_paciente']."</td>";
                echo "<td>".$linha['telefone']."</td>";
                echo "<td>".$linha['data_nascimento']."</td>";
                echo "<td>&nbsp;&nbsp;".$linha['sangue']."</td>";
                echo "<td>".$linha['cep']."</td>";
                // FAZER UM LOOP PARA QUE ELE PASSE POR TODOS OS REGISTROS, E SÓ IMPRIMA CASO OS IDS DE AMBAS AS TABELAS BATAM
                $sqlDoencas="SELECT iddoenca,nome_popular FROM doenca WHERE excluido='false'";
                $resultadoDoencas= pg_query($conecta, $sqlDoencas);
                $qtdeDoencas=pg_num_rows($resultadoDoencas);
                for($te=0;$te<$qtdeDoencas;$te++){
                    $linhaD=pg_fetch_array($resultadoDoencas);
                    if($linhaD['iddoenca']==$linha['iddoenca'])
                    echo "<td>".$linhaD['nome_popular']."</td>";
                }

                
                echo "<td width='80px' height='20px'>&nbsp;&nbsp;&nbsp;<a href='altera_paciente.php?idpaciente=".$linha[idpaciente]."'>"."Alterar"."</a>&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;<a href='confirma_exclusao_paciente.php?idpaciente=".$linha[idpaciente]."'>"."Excluir"."</a></td>";
            
            echo "</tr>";
        } 
        echo "</table>";
        echo "</main>";
    }
    

    else echo "<p class=\"aviso\">Não foi encontrado nenhum paciente nos registros! Tente novamente.</p><br><br>";

    pg_close($conecta);
    /* echo "A conexão com o banco de dados foi encerrada!"; */
            
?>
</body>
