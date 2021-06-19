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

    //dados enviados do script exclui_prod_chamada_confirma_exclusao_logica.php
    $iddoenca = $_POST['iddoenca'];
    $data=date('d/m/Y'); //'Y' (maiúsculo) para ano com 4 dígitos

    $sql="UPDATE doenca 
    set excluido = true
    WHERE iddoenca = $iddoenca";
    //inserida a data de exclusao do produto para documentação

    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);
    if ($qtde > 0 ){
        echo "<script type='text/javascript'>alert('Doença excluída!')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=mostra_doencas.php'>";
    }
    else{
        echo "Erro na exclusão !!!<br>";
        echo "<a class=\"retorna\" href='mostra_doencas.php'>Voltar</a>";
    }
?>
</body>
</html>

