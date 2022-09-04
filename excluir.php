<?php
include ("conexao.php");
include("protecao.php");
if(is_numeric($_GET["ctps"])){
$ctps = $_GET["ctps"];
$sql = "DELETE FROM refape_web.funcionario WHERE ctps='$ctps'";
$resultado=pg_query($conexao, $sql);

if($resultado){
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
echo "<script>alert('Registro excluído com sucesso!');</script>";
echo "<script>window.location = 'listagem.php';</script>";
}
else{
echo "<script>alert('Erro ao excluir o registro!');</script>";
echo "<script>window.location = 'listagem.php';</script>";
}
}
?>
