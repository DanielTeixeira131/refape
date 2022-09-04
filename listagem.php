<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem</title>
  <link href="assets/img/imagem1.png" rel="icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      position: relative;
      margin-left: auto;
      margin-right: auto;
    }

    h1 {
      text-align: center;
    }
  </style>
</head>
<body>
  <?php
  include("protecao.php");
  if (!isset($_SESSION)) {
    session_start();
  }
  require_once("conexao.php");
  if (isset($_SESSION['cnpj']) || isset($_SESSION['nome'])) {
    $email_empresa = $_SESSION['email'];
    $sql = " SELECT * FROM refape_web.funcionario WHERE email_empresa='$email_empresa'";
    $resultado = pg_query($conexao, $sql);
    echo "<h1>Dados dos funcionários:</h1>";
    echo "<br>";
    echo "<table class='table table-hover'>";
    echo "<strong>";
    echo "<thead><tr><th>Nome</th><th>Email</th><th>CTPS</th><th>Email da empresa</th><th>Foto 1</th><th>Foto 2</th><th>Foto 3</th><th>Foto 4</th><th>Foto 5</th><th>Editar</th><th>Excluir</th></tr></thead><tbody>";
    while ($linha = pg_fetch_assoc($resultado)) {
      echo "<tr> <td>" . $linha['nome'] . "</td><td>" . $linha['email'] . "</td><td>" . $linha['ctps'] . "</td><td>" . $linha['email_empresa'] . "</td>
     <td>" . $linha['foto'] . "</td> <td>" . $linha['foto1'] . "</td> <td>" . $linha['foto2'] . "</td> <td>" . $linha['foto3'] . "</td> 
     <td>" . $linha['foto4'] . "</td> <td><a href=editar.php?ctps=" . $linha['ctps'] . "><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
     <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
   </svg></a></td> <td><a href=excluir.php?ctps=" . $linha['ctps'] . ">
   <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
  <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
</svg></a></td></tr>";
    }
    echo "</tbody></table>";
    pg_close($conexao);
    echo "<input  class='btn btn-secondary' type='button' value='Voltar' onClick='javascript:history.back();'/>";
  }
  ?>

</body>

</html>