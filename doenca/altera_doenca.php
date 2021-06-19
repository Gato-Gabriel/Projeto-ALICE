<html>
<head>
    <link rel="stylesheet" href="../css/styleDoencas.css">
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
    $iddoenca = $_GET["iddoenca"];
    $sql="SELECT * FROM doenca WHERE iddoenca = $iddoenca;";
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_num_rows($resultado);
    if ( $qtde == 0 ){
        echo "Doença nao encontrada  !!!<br><br>";
        exit;
    }
    $linha = pg_fetch_array($resultado);
?>
<main>
    <h1>Alteração de Doenças</h1>
    <form action="grava_alteracao_doenca.php" method="post">
        <label>ID da Doença </label> <input type="text" name="iddoenca" 
        value="<?php echo $linha[0]; ?>" size="3" readonly><br>
        <label>Nome popular da doença</label> <input type="text" name="nome_popular" 
        value="<?php echo $linha[1]; ?>" size="9"><br>

        <label>Tem cura?</label>
        <span><input type="radio" name="temCura" value="true" <?php if($linha[2]=='t') echo 'checked'; ?>> Sim </span>
        <span><input type="radio" name="temCura" value="false" <?php if($linha[2]=='f') echo 'checked'; ?>> Não</span> <br>

        <label>Nome científico</label> <input type="text" name="nome_cientifico" 
        value="<?php echo $linha[3]; ?>" ><br>
        <label>Sintomas</label> <br>
        <textarea name="sintomas" cols="28" rows="9" style="font-size: 17px;"><?php echo $linha[4]; ?></textarea> <br>
        <input type="submit" value="Gravar">
    </form>
    <a class="retorna" href="mostra_doencas.php">Retornar</a>
</main>
</body>


</html>
