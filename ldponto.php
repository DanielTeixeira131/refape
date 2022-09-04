<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de ponto</title>
    <link href="assets/img/imagem1.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
     table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
    position: relative;
    margin-left: auto;
    margin-right: auto;
  }
  h1{
    text-align: center;
  }
</style>
</head>
<body>
<?php
include("protecao.php");
if(!isset($_SESSION)){
    session_start();
}
require_once("conexao.php");


if (isset($_SESSION['cnpj']) || isset($_SESSION['nome'])) {
$email_empresa = $_SESSION['email'];
$data = $_POST['data'];
$sql = " SELECT * FROM refape_web.ponto WHERE data='$data' and email_empresa='$email_empresa'"; 
$resultado=pg_query($conexao,$sql);
echo "<h1>Pontos obtidos: </h1>";
echo "<br>";
echo "<table class='table table-hover'>";
echo "<strong>";
echo "<thead><tr><th>Nome</th><th>Email</th><th>CTPS</th><th>Hora de entrada</th><th>Hora de saída</th><th>Tempo de permanência</th><th>Data</th><th>ID</th></tr></thead><tbody>";
while($linha = pg_fetch_assoc($resultado)){
     echo "<tr> <td>".$linha['nome']."</td><td>".$linha['email']."</td><td>".$linha['ctps']."</td><td>".$linha['hora']."</td><td>".$linha['hora_saida']."</td><td>".$linha['tempo_permanencia']."</td><td>".$linha['data']."</td><td>".$linha['id']."</td></tr>";
  
}
echo "</tbody></table>";
pg_close($conexao);
echo "<input  class='btn btn-secondary' type='button' value='Voltar' onClick='javascript:history.back();'/>";
}
?>
</body>
</html>
