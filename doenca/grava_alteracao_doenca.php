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
    $iddoenca=$_POST["iddoenca"];
    $nome_popular=$_POST["nome_popular"];
    $cura=$_POST["temCura"];
    $nome_cientifico=$_POST["nome_cientifico"];
    $sintomas=$_POST["sintomas"];
    $sql="UPDATE doenca 
    SET
    iddoenca = $iddoenca,
    nome_popular = '$nome_popular',
    cura = '$cura',
    nome_cientifico = '$nome_cientifico', 
    sintomas = '$sintomas',
    excluido = 'false'
    WHERE iddoenca = $iddoenca;";
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);
    if ($qtde > 0){
        echo "<script type='text/javascript'>alert('Alteração OK !!!')</script>";
        echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=mostra_doencas.php'>";
    }
    else echo "Erro na alteração !!!<br><br>";
    echo "<a class=\"retorna\" href='mostra_doencas.php'>Voltar</a>";

    pg_close($conecta);
?>
</body>
</html>
