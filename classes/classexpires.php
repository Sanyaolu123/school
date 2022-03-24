<?php 
session_start();
$now = time();
$reg_no = $_SESSION["t_true"];
if($now > $_SESSION["expire"]){
    new ClassExpires($reg_no);
}
?>