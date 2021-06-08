<?php
    include "conexao.php";
    //dados enviados do script altera_prod.php
    $idpaciente = $_GET["idpaciente"];
    $sql="SELECT * FROM paciente WHERE idpaciente = $idpaciente;";
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_num_rows($resultado);
    if ( $qtde == 0 ){
        echo "Paciente nao encontrado  !!!<br><br>";
        exit;
    }
    $linha = pg_fetch_array($resultado);
?>
<form action="grava_alteracao_paciente.php" method="post">
    <h1>Alteração de Pacientes</h1>
    ID do paciente <input type="text" name="idpaciente" 
    value="<?php echo $linha[0]; ?>" readonly><br>
    Nome do paciente <input type="text" name="nome_paciente" 
    value="<?php echo $linha[1]; ?>" ><br>
    Telefone <input type="text" name="telefone" 
    value="<?php echo $linha[2]; ?>" ><br>
    Data de nascimento <input type="text" name="data_nascimento" 
    value="<?php echo $linha[3]; ?>" ><br>
    Sangue <input type="text" name="sangue" 
    value="<?php echo $linha[4]; ?>" ><br>
    CEP <input type="text" name="cep" 
    value="<?php echo $linha[5]; ?>" ><br>
    Id da Doenca <input type="number" name="iddoenca" 
    value="<?php echo $linha[6]; ?>" ><br>
    <input type="submit" value="Gravar">
    <input type="reset" value="Voltar"> //Não está voltando
</form>