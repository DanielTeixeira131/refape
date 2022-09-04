<?php
include("protecao.php");
if(!isset($_SESSION)){
    session_start();
}
require_once("conexao.php");
if (isset($_SESSION['cnpj']) || isset($_SESSION['nome'])) {
$email_empresa = $_SESSION['email'];
//print_r($_FILES);die();
$nome = $_POST['nome'];
$email = $_POST['email'];
$ctps1 = $_POST['ctps'];
$foto = $_FILES['foto'];
$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];
$foto4 = $_FILES['foto4'];
$ctps=str_pad($ctps1, 16, 0, STR_PAD_LEFT);
mkdir('./pasta/'.$ctps);
$pasta="/pasta/$ctps/";
//foto1
$nomearquivo=$foto['name'];
$extensao= strtolower(pathinfo($nomearquivo, PATHINFO_EXTENSION));
if ($extensao!="png"){
    echo "Apenas o formato png é aceito.";
    echo "<br/><br/>";
    echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
    die;
}
$o=move_uploaded_file($foto["tmp_name"], "./".$pasta.'1'. "." . $extensao);
$p1 = $pasta . '1'. "." .$extensao;

//foto2
$nomearquivo3=$foto1['name'];
$extensao1= strtolower(pathinfo($nomearquivo3, PATHINFO_EXTENSION));
if ($extensao1!="png"){
    echo "Apenas o formato png é aceito.";
    echo "<br/><br/>";
    echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
    die;
}
$g=move_uploaded_file($foto1["tmp_name"], "./".$pasta. '2' . "." . $extensao1);
$g1 = $pasta  . '2' . "." .$extensao1;

//foto3

$nomearquivo5=$foto2['name'];
$extensao2= strtolower(pathinfo($nomearquivo5, PATHINFO_EXTENSION));
if ($extensao2!="png"){
    echo "Apenas o formato png é aceito.";
    echo "<br/><br/>";
    echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
    die;
}
$g2=move_uploaded_file($foto2["tmp_name"], "./".$pasta. '3' . "." . $extensao2);
$g3 = $pasta . '3' . "." .$extensao2;

//foto 4
$nomearquivo7=$foto3['name'];
$extensao3= strtolower(pathinfo($nomearquivo7, PATHINFO_EXTENSION));
if ($extensao3!="png"){
    echo "Apenas o formato png é aceito.";
    echo "<br/><br/>";
    echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
    die;
}
$g4=move_uploaded_file($foto3["tmp_name"], "./".$pasta. '4'. "." . $extensao3);
$g6 = $pasta . '4' . "." .$extensao3;

//foto 5
$nomearquivo9=$foto4['name'];
$extensao4= strtolower(pathinfo($nomearquivo9, PATHINFO_EXTENSION));
if ($extensao4!="png"){
    echo "Apenas o formato png é aceito.";
    echo "<br/><br/>";
    echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
    die;
}
$g8=move_uploaded_file($foto4["tmp_name"], "./".$pasta. '5' . "." . $extensao4);
$g9 = $pasta . '5' . "." .$extensao4;

$sql = "INSERT INTO refape_web.funcionario (nome, email, ctps, email_empresa, foto, foto1, foto2, foto3, foto4) VALUES ( '$nome', '$email', '$ctps', '$email_empresa', '$p1', '$g1', '$g3', '$g6', '$g9');";
    $resultado=pg_query($conexao, $sql);
    if(!$resultado){
    echo "Ocorreu um erro no cadastro, tente novamente.";
}else{
echo "Cadastro realizado com sucesso!";
}
pg_close($conexao);
echo "<br/><br/>";
echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
}
?>


