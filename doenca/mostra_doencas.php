<head>
    <link rel="stylesheet" href="../css/styleDoencas.css">
    <title>Registro de Doenças</title>
</head>
<body>
<header>
    <img src="../imgs/icone_home.png" alt="">
    <a href="../conexao/home.html">Home</a>
</header>
<?php
    include "../conexao/conexao.php";

    $sql="SELECT * FROM doenca WHERE excluido='false' ORDER BY iddoenca";

    $resultado= pg_query($conecta, $sql);

    $qtde=pg_num_rows($resultado);
                
    if ($qtde > 0) {
        echo "<main id=\"pesquisa\">";
        echo "<h1>Registro de Doenças</h1>";
        
     echo "<table border='1'>";
        
        echo "<tr>";
            echo "<td width='50px' height='20px'>"."&nbsp;&nbsp;&nbsp;ID"."</td>";
            echo "<td width='140px' height='20px'>&nbsp;"."Nome Popular"."</td>";
            echo "<td width='62px' height='20px'>"."&nbsp;Tem &nbsp;cura?"."</td>";
            echo "<td width='130px' height='20px'>&nbsp;&nbsp;&nbsp;"."Nome científico"."</td>";
            echo "<td width='190px' height='20px'>&nbsp;&nbsp;"."Sintomas"."</td>";
            /* echo "<td width='40px' height='20px'>"."Alteração/ Exclusão"."</td>"; */
        echo"</tr>";
        
        for ($cont=0; $cont < $qtde; $cont++) {
            $linha=pg_fetch_array($resultado);
            echo "<tr>"; 
                echo "<td>&nbsp;".$linha['iddoenca']."</td>";
                echo "<td>".$linha['nome_popular']."</td>";
                $temCura = ($linha['cura']=='f')? 'Não' : 'Sim';
                echo "<td>&nbsp;&nbsp;".$temCura."</td>";
                echo "<td>".$linha['nome_cientifico']."</td>";
                echo "<td>".$linha['sintomas']."</td>";
                echo "<td>&nbsp;&nbsp;<a href='altera_doenca.php?iddoenca=".$linha[iddoenca]."'>"."Alterar"."</a>&nbsp;&nbsp;<br>
                &nbsp;&nbsp;<a href='confirma_exclusao_doenca.php?iddoenca=".$linha[iddoenca]."'>"."Excluir"."</a></td>";
            
            echo "</tr>";
        } 
        echo "</table>";
        echo "</main>";
    }
    
    else echo "Não foi encontrada nenhuma doença nos registros !!! Tente novamente mais tarde.<br><br>";

    pg_close($conecta);
?>
</body>
