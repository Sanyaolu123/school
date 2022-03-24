<?php 
include_once "../oop-classes/classes.php";
include_once "../db.php";
session_start();
if(!isset($_SESSION["stud_id"])){
    unset($_SESSION["s_true"]);
}
if(isset($_SESSION["stud_id"])){
    $matric_no = $_SESSION["stud_no"];
    $classS = $_SESSION['stud_course'];
}
if(isset($_SESSION["t_true"])){
    $reg_no = $_SESSION["t_true"];
    $now = time();
    new teacherSession($reg_no, $now);
    if($now > $_SESSION["expire"]){
        new ClassExpires($reg_no);
    }
}else{
    new StudentSession();
}
?>



    

