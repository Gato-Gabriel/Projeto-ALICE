<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Conexão com o Banco de Dados</title>
    <link rel="stylesheet" href="../css/styleRaiz.css">
</head>
<body>
<?php
    $conecta = pg_connect("host=localhost port=5432 dbname=a08gatosant user=a08gatosant password=cti");
    if (!$conecta){
        echo "<p class=\"aviso\">Não foi possível estabelecer conexão com o banco de dados!</p><br><br>";
        exit;
    }
?>    
</body>
</html>