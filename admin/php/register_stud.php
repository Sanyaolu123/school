<?php 
include_once "../../db.php";
$fname = mysqli_real_escape_string($db, $_POST["fname"]);
$mname = mysqli_real_escape_string($db, $_POST["mname"]);
$lname = mysqli_real_escape_string($db, $_POST["lname"]);
$dob = mysqli_real_escape_string($db, $_POST["dob"]);
$course = mysqli_real_escape_string($db, $_POST["course"]);
$transfer = mysqli_real_escape_string($db, $_POST["transfer"]);
$gender = mysqli_real_escape_string($db, $_POST["gender"]);

if(empty($fname)){
    echo "Missing first name!";
}else{
    if(empty($mname)){
        echo "Missing Middle Name!";
    }else{
        if(empty($lname)){
            echo "Missing Last Name!";
        }else{
            if(empty($dob)){
                echo "Missing Date of Birth!";
            }else{
                if($course == "disabled"){
                    echo "Please Select a Course!";
                }else{
                    $sql = "SELECT * FROM students WHERE dob = '".$dob."'";
                $query = mysqli_query($db, $sql);
                $code = rand(time(), 1000);
                $matric_no = "MAT".$code;
                $password_hashed = lcfirst($lname);
                $password = password_hash($password_hashed, PASSWORD_DEFAULT);
                
                $sql = "INSERT into students (matric_no, fname, mname, lname, password, dob, course, transfer, gender) 
                VALUES('$matric_no', '$fname', '$mname', '$lname', '$password', '$dob', '$course', '$transfer', '$gender')";

                $query = mysqli_query($db, $sql);

                if($query){
                    
                    echo "Student has been Registered Successfully!";
                }
                }
            }
        }
    }
}
?>
