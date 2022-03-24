<?php 
include("../../db.php");

$fname = mysqli_real_escape_string($db, $_POST["fname"]);
$mname = mysqli_real_escape_string($db, $_POST["mname"]);
$lname = mysqli_real_escape_string($db, $_POST["lname"]);
$dob = mysqli_real_escape_string($db, $_POST["dob"]);
$role = mysqli_real_escape_string($db, $_POST["role"]);
$gender = mysqli_real_escape_string($db, $_POST["gender"]);

if(empty($fname)){
    echo "Missing Firstname!";
}
else{
    if(empty($mname)){
        echo "Missing Middle Name!";
    }
    else{
        if(empty($lname)){
            echo "Missing Last Name!";
        }else{
            if(empty($dob)){
                echo "Missing Date of Birth!";
            }else{
                if($role == "disabled"){
                    echo "Please Select a role!";
                }else{
                    if(!preg_match("/^[a-zA-Z\-]*$/",$fname)){
                        echo "Invalid First Name Characters!";
                    }else{
                        if(!preg_match("/^[a-zA-Z\-]*$/",$mname)){
                            echo "Invalid Middle Name Characters!";
                        }else{
                            if(!preg_match("/^[a-zA-Z]*$/",$lname)){
                                echo "Invalid Last Name Characters!";
                            }else{
                                $sql = "SELECT * FROM teachers WHERE role = '".$role."'";
                                $query = mysqli_query($db, $sql);

                                if(mysqli_num_rows($query) > 0){
                                    echo "Role has already been allocated!";
                                }else{
                                    
                                    
                                    $reg_no_code = rand(time(), 10000);
                                    $reg_no = "TEA".$reg_no_code;
                                    $passwordS = lcfirst($lname);
                                    $password = password_hash($passwordS, PASSWORD_DEFAULT);
                                    $sql = "INSERT INTO teachers (reg_no, fname, mname, lname, password, gender, dob, role) VALUES 
                                    ('$reg_no', '$fname', '$mname', '$lname', '$password', '$gender', '$dob', '$role')";

                                    $query = mysqli_query($db, $sql);

                                    if($query){
                                        echo "Teacher has been registered Successfully!";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>