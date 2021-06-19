<html>
    <head>
        <link rel="stylesheet" href="../css/styleDoencas.css">
        <link rel="stylesheet" href="../css/styleRaiz.css">
    </head>
<body>
    <header>
        <img src="../imgs/icone_home.png" alt="">
        <a href="home.html">Home</a>
    </header>
<?php
    include "../conexao/conexao.php"; 
    //dados enviados do script altera_prod_lista.php
    $idpaciente=$_POST["idpaciente"];
    $nome_paciente=$_POST["nome_paciente"];
    $telefone=$_POST["telefone"];
    $data_nascimento=$_POST["data_nascimento"];
    $sangue="A+";//$_POST["tipoSanguineo"];
    $cep=$_POST["cep"];
    $iddoenca = $_POST["iddoenca"];
    $sql="UPDATE paciente 
    SET
    idpaciente = $idpaciente,
    nome_paciente = '$nome_paciente',
    telefone = '$telefone',
    data_nascimento = '$data_nascimento', 
    sangue = '$sangue',
    cep = '$cep',
    iddoenca = $iddoenca,
    excluido = 'false'
    WHERE idpaciente = $idpaciente;";
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);
    if ($qtde > 0){
        echo "<script type='text/javascript'>alert('Alteração OK !!!')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=mostra_pacientes.php'>";
    }
    else echo "Erro na gravacao !!!<br><br>";

    pg_close($conecta);
    echo "A conexão com o banco de dados foi encerrada!"
?>
</body>
</html>
