<?php
session_start();
if($_SESSION["loged_in"]){
}else{
    header("Location: /ChristieMeta/index.php/");
}
?>