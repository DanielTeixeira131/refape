<?php
include("protecao.php");
if(!isset($_SESSION)){
    session_start();
}
require_once("conexao.php");
//print_r($_FILES);die();
$nome = $_POST['nome'];
$email = $_POST['email'];
$ctps1 = $_POST['ctps'];
$email_empresa = $_POST['email_empresa'];
$foto = $_FILES['foto'];
$foto1 = $_FILES['foto1'];
$foto2 = $_FILES['foto2'];
$foto3 = $_FILES['foto3'];
$foto4 = $_FILES['foto4'];
$ctps=str_pad($ctps1, 16, 0, STR_PAD_LEFT);
function vazio($caminho1) {
    if (is_dir($caminho1)) {
        $caminho = scandir($caminho1);
        foreach ($caminho as $arquivos) {
            if ($arquivos!=='.') {
                if ($arquivos!=='..') {
                    if (!is_dir($caminho1.'/'.$arquivos)) {
                        unlink($caminho1.'/'.$arquivos);
                    } else {
                        vazio($caminho1.'/'.$arquivos);
                        rmdir($caminho1.'/'.$arquivos);
                    }
                }
            }
        }
    }
}

$caminho1 = './pasta/'.$ctps;
vazio($caminho1);
rmdir($caminho1);
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

$sql = "UPDATE refape_web.funcionario SET nome='$nome', email='$email', ctps='$ctps', email_empresa='$email_empresa', foto='$p1', foto1='$g1', foto2='$g3', foto3='$g6', foto4='$g9' WHERE ctps='$ctps';";
    $resultado=pg_query($conexao, $sql);
    if(!$resultado){
    echo "Ocorreu um erro na edição, tente novamente.";
}else{
echo "Edição realizada com sucesso!";
}
pg_close($conexao);
echo "<br/><br/>";
echo "<input type='button' value='Voltar' onClick='javascript:history.back();'/>";
?>


