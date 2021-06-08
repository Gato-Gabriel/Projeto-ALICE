<?php
    include "conexao.php";

    $nomePac = $_POST['pacNome'];
    $sql="SELECT * FROM paciente WHERE excluido='false'";

    $resultado= pg_query($conecta, $sql);

    $qtde=pg_num_rows($resultado);
                
    if ($qtde > 0) {
        echo "<h1>Produtos Encontrados</h1><br><br>";
        
     echo "<table border='1'>";
        
        echo "<tr>";
            echo "<td width='40px' height='20px'>"."Id do Paciente"."</td>";
            echo "<td width='40px' height='20px'>"."Nome"."</td>";
            echo "<td width='40px' height='20px'>"."Telefone"."</td>";
            echo "<td width='40px' height='20px'>"."Data de Nascimento"."</td>";
            echo "<td width='40px' height='20px'>"."Tipo Sanguíneo"."</td>";
            echo "<td width='40px' height='20px'>"."CEP"."</td>";
            echo "<td width='40px' height='20px'>"."Doença"."</td>";
            echo "<td width='40px' height='20px'>"."Alteração/ Exclusão"."</td>";
        echo"</tr>";
        
        for ($cont=0; $cont < $qtde; $cont++) {
            $linha=pg_fetch_array($resultado);
            echo "<tr>"; 
                echo "<td>".$linha['idpaciente']."</td>";
                echo "<td>".$linha['nome_paciente']."</td>";
                echo "<td>".$linha['telefone']."</td>";
                echo "<td>".$linha['data_nascimento']."</td>";
                echo "<td>".$linha['sangue']."</td>";
                echo "<td>".$linha['cep']."</td>";
                echo "<td>".$linha['iddoenca']."</td>";
                echo "<td><a href='altera_paciente.php?idpaciente=".$linha[idpaciente]."'>"."Alterar"."</a>&nbsp;&nbsp;
                <a href='confirma_exclusao_paciente.php?idpaciente=".$linha[idpaciente]."'>"."Excluir"."</a></td>";
            
            echo "</tr><br>";
        } 
        echo "</table>";
    }
    
    

    else echo "Não foi encontrado nenhum produto !!!<br><br>";

    pg_close($conecta);

    echo "A conexão com o banco de dados foi encerrada!";
            
?>