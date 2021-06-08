<?php
    include "conexao.php";
    //dados enviados do script exclui_prod.php
    $idpaciente = $_GET["idpaciente"];
    $sql="SELECT * FROM paciente WHERE idpaciente = $idpaciente;";
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_num_rows($resultado);
    if ( $qtde == 0 ){echo "Registro nao encontrado  !!!<br><br>";exit;}
    $linha = pg_fetch_row($resultado);
?>
<form action="exclusao_logica_paciente.php" method="post">
    <h1>Exclusão de Pacientes</h1>
    ID do paciente <input type="text" name="idpaciente" 
    value="<?php echo $linha[0]; ?>" readonly><br>
    Nome do paciente <input type="text" name="nome_paciente" 
    value="<?php echo $linha[1]; ?>" readonly><br>
    Telefone <input type="text" name="telefone" 
    value="<?php echo $linha[2]; ?>" readonly><br>
    Data de nascimento <input type="text" name="data_nascimento" 
    value="<?php echo $linha[3]; ?>" readonly><br>
    Sangue <input type="text" name="sangue" 
    value="<?php echo $linha[4]; ?>" readonly><br>
    CEP <input type="text" name="cep" 
    value="<?php echo $linha[5]; ?>" readonly><br>
    ID da Doença <input type="text" name="iddoenca" 
    value="<?php echo $linha[6]; ?>" readonly><br>
    <input type="submit" value="Confirma exclusão">	
</form>