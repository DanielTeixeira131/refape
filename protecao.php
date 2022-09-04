<?php
session_start();
if(!isset($_SESSION['cnpj'])){
    die("Logue-se para acessar essa página. <br> <br> <input type='button' value='Login' onClick=\"window.location.href='login.php'\"/>");
}
?>
