<?php
require_once("conexao.php");
$nome = $_POST['nome'];
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$cartao = $_POST['cartao'];
$cvv = $_POST['cvv'];
$data = $_POST['data'];
$sql = "INSERT INTO refape_web.empresa (nome, email, cnpj, senha, cartao, cvv, data) VALUES ( '$nome', '$email', '$cnpj', '$senha', '$cartao','$cvv', '$data');";
$resultado=pg_query($conexao, $sql);
if(!$resultado){
echo "Ocorreu um erro no cadastro, tente novamente.";
}else{
echo "Cadastro realizado com sucesso!";
}
pg_close($conexao);
echo "<br/><br/>";
echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
echo "<br/><br/>";
echo "<input type='button' value='Login' onClick=\"window.location.href='login.php'\"/> "
?>


