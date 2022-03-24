<?php 
include_once "../db.php";
require "../oop-classes/classes.php";
// $reg_no = mysqli_real_escape_string($db, $_POST["reg_no"]);



if(isset($_GET["stud_login"])){
    $matric_no = mysqli_real_escape_string($db, $_POST["matric_no"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    new Login($matric_no, $password);
}
if(isset($_GET["t_login"])){
    $reg_no = mysqli_real_escape_string($db, $_POST["reg_no"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    new tLogin($reg_no, $password);
}
if(isset($_GET["join_class"])){
    $joinCourse = mysqli_real_escape_string($db, $_POST["joinCourse"]);
    $matric_no = mysqli_real_escape_string($db, $_POST["matric_no"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    new StudentJoinClass($joinCourse, $matric_no, $password);
}
if(isset($_GET["class_activate"])){
    $reg_no = mysqli_real_escape_string($db, $_POST["reg_no"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    $class = mysqli_real_escape_string($db, $_POST["class"]);

    new classActivation($reg_no, $password, $class);
}
if(isset($_GET["t_rejoin"])){
    $reg_no = mysqli_real_escape_string($db, $_POST["reg_no"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    new tRejoin($reg_no, $password);
}
if(isset($_GET["create_class"])){
    session_start();
    $author = $_SESSION["t_reg_no"];
    $gender = $_SESSION["gender"];
    $t_role = $_SESSION["t_role"];

    $course = lcfirst(mysqli_real_escape_string($db, $_POST["course"]));
    $topic = mysqli_real_escape_string($db, $_POST["topic"]);
    $classInfo = mysqli_real_escape_string($db, $_POST["classInfo"]);
    $stream = mysqli_real_escape_string($db, $_POST["stream"]);
    $timeDurate = mysqli_real_escape_string($db, $_POST["timeDurate"]);
    $timeoption = mysqli_real_escape_string($db, $_POST["time"]);

    $timeDuration = $timeDurate." ".$timeoption;
    $uploadedfile = $_FILES["file"];

    new createClass($author, $gender, $t_role, $course, $topic, $classInfo, $stream, $timeDurate, $timeDuration, $uploadedfile);
}