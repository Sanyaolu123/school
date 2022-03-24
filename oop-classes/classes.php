<?php 
// Database
class Database
{
    public function makeDB(){
        $db = mysqli_connect("localhost", "root", "", "school");
        if(!$db){
            $die = die("Connection Error").mysqli_errno();
            return $die;
        }
        else{
            return $db;
        }
    }
}

// Student Login
class Login 
{
    public $no;
    public $password;
    protected $error;

    public function __construct($matric_no, $password){
        session_start();
        $this->no = $matric_no;
        $this->password = $password;
        $database = new Database();

        if(empty($this->no)){
            echo "Matric. Number is Needed for Login!";
            }
            else{
        if(empty($this->password)){
            echo "Password is Needed for Login!";
        }
        else{
            $sql = "SELECT * FROM students where matric_no = '$this->no'";
            $query = mysqli_query($database->makeDB(), $sql);
    
            if($studentRow = mysqli_fetch_assoc($query)){
                $chkpassword = password_verify($password, $studentRow["password"]);
    
                if($chkpassword === false){
                    echo "Password is Incorrect!";
                }else{
                    if($chkpassword === true){
                        $_SESSION["stud_id"] = $studentRow["student_id"];
                        $_SESSION["stud_no"] = $studentRow["matric_no"];
                        $_SESSION["stud_lname"] = $studentRow["lname"];
                        $_SESSION["stud_fname"] = $studentRow["fname"];
                        $_SESSION["stud_course"] = $studentRow["course"];
                        $_SESSION["r_u"] = "set";
                        echo "success";
                    }
                }
            }else{
                echo "Matric. Number is Incorrect!";
            }
        }
    }
    }
}

//Teacher Login
class tLogin
{
    public $no;
    public $password;

    public function __construct($reg_no, $password){

        $this->no = $reg_no;
        $this->password = $password;
        $database = new Database();

        session_start();
        if(empty($this->no)){
            echo "Registration Number is Needed to Login!";
        }else{
        if(empty($this->password)){
            echo "Password is Needed to Login!";
        }else{
            $sql = "SELECT * from teachers WHERE reg_no = '$this->no'";
        $query = mysqli_query($database->makeDB(), $sql);
        
        if($teacherRow = mysqli_fetch_assoc($query)){
            $chkpass = password_verify($password, $teacherRow["password"]);
            
            if($chkpass === false){
                echo "Password is Incorrect!";
            }
            else{
                if($chkpass === true){
                    $_SESSION["t_id"] = $teacherRow["teacher_id"];
                    $_SESSION["t_fname"] = $teacherRow["fname"];
                    $_SESSION["t_lname"] = $teacherRow["lname"];
                    $_SESSION["t_role"] = $teacherRow["role"];
                    $_SESSION["t_reg_no"] = $teacherRow["reg_no"];
                    $_SESSION["r_u"] = "set";
                    $_SESSION["gender"] = $teacherRow["gender"];
                    echo "success";
                }
            }
        }else{
            echo "Registration Number is Incorrect!";
        }
        }
        }
    }
}

// Student Join class Check department
class StudentJoinClassCheckDepartment
{
    public function checkActiveClassForTheDay(){
        if(isset($_SESSION["stud_id"])){
            $course_ong = $_SESSION["stud_course"];
        }
        $database = new Database();
        $sql = "SELECT * FROM classes WHERE status = 'ongoing' and ongoing_class = \"$course_ong\"";
                $query = mysqli_query($database->makeDB(), $sql);

                    while($classes = mysqli_fetch_array($query)){
                        $class = $classes["ongoing_class"];
                        $title = ucfirst($class);
                        echo "<option value='$class'>$title - class</option>";
                }
    }
}

// Teachers Logs in to class to enable students login
class tRejoin
{
    public $no;
    public $password;

    public function __construct($reg_no, $password){
        $this->no = $reg_no;
        $this->password = $password;
        session_start();
        $database = new Database();

        if(empty($this->no)){
            echo "Registration Number is Needed!";
        }else{
            if(empty($this->password)){
                echo "Password is Needed!";
            }
            else{
                $sql = "SELECT * FROM classes where teacher_author = '$this->no' and status = \"ongoing\"";
                $query = mysqli_query($database->makeDB(), $sql);
        
                if($row = mysqli_fetch_assoc($query)){
                    $timeDuration = $row["timeduration"];
        
                    $split_time = explode(" ", $timeDuration);
                    
                    $time = $split_time[0];
        
                    $decider = $split_time[1];
        
                    if($decider == "seconds"){
                        $decider = $time;
                    }else{
                        if($decider == "minutes"){
                            $decider = $time * 60;
                            
                        }
                    }
        
                    $sql = "UPDATE classes SET teacher_login = 'yes' where teacher_author = '$this->no' and status = \"ongoing\"";
                    mysqli_query($database->makeDB(), $sql);
                    
                    $_SESSION["t_true"] = $this->no;
        
                    $_SESSION["user"] = "user has been set!";
        
                    $_SESSION["start"] = time(); 
        
                    $_SESSION["expire"] = $_SESSION["start"] + ($decider);
        
                    echo "success";
                }else{
                    echo "You have no class ongoing";
                }
            }
        }
    }
}

// Student Joining Class
class StudentJoinClass
{
    public function __construct($joinCourse, $matric_no, $password){
        session_start();
        $database = new Database();
        if($joinCourse == "disabled"){
            echo "Please Select a Class!";
        }else{
            if(empty($matric_no)){
                echo "Please input your matric number!";
            }else{
                if(empty($password)){
                    echo "Please input your password!";
                }else{
                    $id = $_SESSION["stud_id"];
                    $sql = "SELECT * FROM students where matric_no = \"$matric_no\" and student_id = \"$id\"";
                    $query = mysqli_query($database->makeDB(), $sql);
        
                    if($chkVal = mysqli_fetch_assoc($query)){
                        $course = $chkVal["course"];
                        
                        if($joinCourse == "$course"){
                            $sql = "SELECT * FROM classes where ongoing_class = \"$joinCourse\" and status = 'ongoing'";
                            $query = mysqli_query($database->makeDB(), $sql);
        
                            if($chkLVal = mysqli_fetch_assoc($query)){
                                $chkpassL = password_verify($password, $chkLVal["password"]);
        
                                if($chkpassL === false){
                                    echo "Incorrect Class login password!";
                                }else{
                                    if($chkpassL === true){
                                        $_SESSION["s_true"] = $_SESSION["stud_course"];
                                        $_SESSION["matric_no_stu"] = $_SESSION["stud_no"];
                                        $no_m_s = $_SESSION["matric_no_stu"];
        
                                        $date = date("j/m/Y");
                                        $fname = $_SESSION["stud_fname"];
                                        $lname = $_SESSION["stud_lname"];
        
                                        $full_name = $lname." ".$fname;
                                        $sql = "INSERT into participants (parti_no, date, status, course, full_name) VALUES ('$no_m_s', '$date', 'ongoing', '$course', '$full_name')";
                                        $query = mysqli_query($database->makeDB(), $sql);
                                        if($query){
                                            echo "success";
                                        }
                                    }
                                }
                            }
                        }else{
                            echo "There are no classes setup for your department!";
                        }
                    }else{
                        echo "Your matric no is incorrect!";
                    }
                }
            }
        }
    }
}

//Teacher's Activating Class
class classActivation
{
    public function __construct($reg_no, $password, $class){
        $database = new Database();
        session_start();
        if(empty($reg_no)){
            echo "Registration Number is needed to validate class!";
        }else{
            if(empty($password)){
                echo "Password is required to validate class!";
            }else{
                $sql = "SELECT * from classes where teacher_author = \"$reg_no\" and status = 'pending'";
                $query = mysqli_query($database->makeDB(), $sql);
        
                if($chkrow = mysqli_fetch_assoc($query)){
                    $chID = $chkrow["class_id"];
                    $chkpass = password_verify($password, $chkrow["password"]);
        
                    if($chkpass === false){
                        echo "Password is Incorrect!";
                    }else{
                        if($chkpass === true){
                            $sql = "SELECT * FROM classes where status = 'ongoing' and teacher_author = \"$reg_no\"";
                            $query = mysqli_query($database->makeDB(), $sql);
        
                            if(mysqli_num_rows($query) > 0){
                                echo "This Class has been activated already!";
                            }
                            else{
                                $_SESSION["t_login"] = "true";
                            $chktlogin = $_SESSION["t_login"];
        
                            $sql = "UPDATE classes SET status = 'ongoing' where ongoing_class = \"$class\" and class_id = \"$chID\"";
                            $query = mysqli_query($database->makeDB(), $sql);
        
                            if($query){
                                
        
                                
                                $sqlt = "SELECT * FROM classes_teachers where status = 'pending' and course = \"$class\"";
                                $queryt = mysqli_query($database->makeDB(), $sqlt);
        
                                if($ckTC = mysqli_fetch_assoc($queryt)){
                                    $ckTCID = $ckTC["class_t_id"];
                                    
                                }
                                $sql2 = "UPDATE classes_teachers SET status = 'ongoing' where course = \"$class\" and class_t_id = \"$ckTCID\"";
                                $query2 = mysqli_query($database->makeDB(), $sql2);
        
                                if($query2){
                                    $_SESSION["v_t"] = $reg_no;
                                    unset($_SESSION["course_l"]);
                                    unset($_SESSION["p_l_password"]);
                                    echo "success";
                                }
                            }
                                
                            }
                        }
                    }
                }else{
                    echo "Registration Number was not found for this class!";
                }
            }
        }
    }
}

// Teacher's Create Class Object
class createClass
{
    public function __construct($author, $gender, $t_role, $course, $topic, $classInfo, $stream, $timeDurate, $timeDuration, $uploadedfile)
    {
        $database = new Database();

        

        if(empty($course)){
            echo "Please input the course name";
        }else{
            $array = ["science", "commercial", "arts"];
            if(!in_array($course, $array)){
                echo "Please Select a course out of\r\nScience.\r\nCommercial.\r\nArts.";
            }else{
                if($t_role != "$course"){
                    echo "Your role is to organize classes for the $t_role department!";
                }else{
                    if($t_role == "$course"){
                        $sql = "SELECT * FROM classes where ongoing_class = \"$course\" AND status = 'pending'";
            $query = mysqli_query($database->makeDB(), $sql);
            $result = mysqli_num_rows($query);

            if($result > 0){
                echo "The Class has already been created and is waiting for authentication!\r\nCheck your dashboard for details!";
            }else{
                if(empty($topic)){
                    echo "Please input the topic!";
                }
                else{
                    if(empty($classInfo)){
                        echo "Please input some information about the class!";
                    }
                    else{
                        if(empty($timeDurate)){
                            echo "Please input the time duration!";
                        }else{
                            if(!preg_match("/^[0-9\.]*$/",$timeDurate)){
                                echo "Class Duration should be in Numbers not Words!";
                            }else{
                                // First Upload
                            $image_name = $uploadedfile["name"];
                            $image_type = $uploadedfile["type"];
                            $image_error = $uploadedfile["error"];
                            $image_size = $uploadedfile["size"];
                            $image_tmpname = $uploadedfile["tmp_name"];
                            
                            if($image_name == ""){
                                echo "Please Choose a File to Upload";
                            }else{
                                
                                        $allowed_exts = ["pdf", "doc", "docx", "ppt", "pptx", "xls", "xlsx", "txt"];
            
                                                $image_ext = explode(".", $image_name);
                                                $image_extr_ext = end($image_ext);
                                                
                                                if(in_array($image_extr_ext, $allowed_exts)){
                                                    $sql = "SELECT * FROM classes where teacher_author = \"$author\" and status = 'ongoing'";
                                                    $query = mysqli_query($database->makeDB(), $sql);
                                                    if(mysqli_num_rows($query) > 0){
                                                        echo "A class you created is still ongoing";
                                                    }else{
                                                        $sql = "SELECT * FROM classes where teacher_author = \"$author\" and status = 'pending'";
                                                        $query = mysqli_query($database->makeDB(), $sql);

                                                        if(mysqli_num_rows($query) > 0){
                                                            echo "A class you created is pending and waiting for validation\r\nCheck your dashboard for details";
                                                        }else{
                                                            $bytes = openssl_random_pseudo_bytes(8);
                                                    $pass = bin2hex($bytes);
                                                    date_default_timezone_set("GMT");
                                                    if (strlen(date("j") > 1)){
                                                        $day = date("j");
                                                    }
                                                    else{
                                                        if(strlen(date("j") < 2)){
                                                            $day = date("0j");
                                                        }
                                                    }
                                                    $date =  date("$day/m/Y");
                                                    
                                                    
                                                    $_SESSION["course_l"] = $course;
                                                    $_SESSION["p_l_password"] = $pass;
                                                    $hash = password_hash($pass, PASSWORD_DEFAULT);
                                                    
                                                    $sql = "SELECT * FROM classes where ongoing_class = \"$course\" and status = 'expired'";
                                                    $query = mysqli_query($database->makeDB(), $sql);

                                                    

                                                    if(mysqli_num_rows($query) > 0){
                                                        $sql = "DELETE FROM classes where ongoing_class = \"$course\" and status = 'expired'";
                                                        $query = mysqli_query($database->makeDB(), $sql);

                                                        $sqlte = "DELETE FROM classes_teachers where course = \"$course\" and status = 'expired'";
                                                        $queryte = mysqli_query($database->makeDB(), $sqlte);

                                                        if($queryte){
                                                            if(move_uploaded_file($image_name, "../pdfs/$image_name")){
                                                                $sql = "INSERT into classes (ongoing_class, topic, classInfo, stream, timeduration, uploadedfile, status, password, teacher_login, teacher_author , gender) 
                                                        VALUES ('$course', '$topic', '$classInfo', '$stream', '$timeDuration', '$image_name', 'pending', '$hash', 'no', '$author', '$gender')";
            
                                                        $query = mysqli_query($database->makeDB(), $sql);
            
                                                        if($query){
                                                        $t_sql = "INSERT into classes_teachers (course, password, date, status, teacher) VALUES ('$course', '$pass', '$date', 'pending', '$author')";
                                                                    mysqli_query($database->makeDB(), $t_sql);
                                                        echo "success";
                                                        }
                                                            }else{
                                                            $_SESSION["retry"] = "yes";

                                                            if(isset($_SESSION["retry"])){
                                                                $target_dir = "../classes/pdfs/$image_name";
                                                                if(move_uploaded_file($image_tmpname, $target_dir)){
                                                                
                                                                
                                                                    $sql = "INSERT into classes (ongoing_class, topic, classInfo, stream, timeduration, uploadedfile, status, password, teacher_login, teacher_author, gender) 
                                                            VALUES ('$course', '$topic', '$classInfo', '$stream', '$timeDuration', '$image_name', 'pending', '$hash', 'no', '$author', '$gender')";
                
                                                            $query = mysqli_query($database->makeDB(), $sql);
                
                                                            if($query){
                                                            $t_sql = "INSERT into classes_teachers (course, password, date, status, teacher) VALUES ('$course', '$pass', '$date', 'pending', '$author')";
                                                                        mysqli_query($database->makeDB(), $t_sql);
                                                            echo "success";
                                                            }
                                                                }else{
                                                                    echo "Issues Creating Class!";
                                                                }
                                                            }

                                                            }
                                                        }
                                                    }else{
                                                        $target_dir = "../classes/pdfs/$image_name";
                                                        if(move_uploaded_file($image_tmpname, $target_dir)){
                                                            
                                                        
                                                            $sql = "INSERT into classes (ongoing_class, topic, classInfo, stream, timeduration, uploadedfile, status, password, teacher_login, teacher_author, gender) 
                                                    VALUES ('$course', '$topic', '$classInfo', '$stream', '$timeDuration', '$image_name', 'pending', '$hash', 'no', '$author', '$gender')";

                                                    $query = mysqli_query($database->makeDB(), $sql);

                                                    if($query){
                                                    $t_sql = "INSERT into classes_teachers (course, password, date, status, teacher) VALUES ('$course', '$pass', '$date', 'pending', '$author')";
                                                                mysqli_query($database->makeDB(), $t_sql);
                                                    echo "success";
                                                    }
                                                        }else{
                                                            echo "Issues Creating Class!";
                                                        }
                                                    }
                                                        }
                                                }
                                                                                    
                                                }
                                                else{
                                                    echo "The Selected file format is not supported!";
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
        }
    }
}


// Get The participants for the class object
class getParticipants
{
    public function __construct(){
        $database = new Database();
        if(isset($_SESSION["t_true"])){
            $_get_files = $_SESSION["t_true"];
            
            $sql = "SELECT * FROM classes where teacher_author = \"$_get_files\" and status = 'ongoing'";
            $query = mysqli_query($database->makeDB(), $sql);
            if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                $gender = $row["gender"];
                $pdf = $row["uploadedfile"];
                $sql = "SELECT * FROM teachers where reg_no = \"$_get_files\"";
                $querytrow = mysqli_query($database->makeDB(), $sql);
                if($trow = mysqli_fetch_assoc($querytrow)){
                    $t_f_name = $trow["fname"];
                    $t_l_name = $trow["lname"];
                }
            
                if($gender === "male"){
                    echo "
                    <p class=\"text-xs underline mt-5\">You</p>
                    <p class=\"text-xs\">Mr. $t_l_name $t_f_name</p>";
                    $t_role = $_SESSION["t_role"];
                    
                    
                }else{
                    echo "
                    <p class=\"text-xs underline mt-5\">You</p>
                    <p class=\"text-xs\">Mrs. $t_l_name $t_f_name</p>";
                }
                $t_role = $_SESSION["t_role"];
                $sql = "SELECT * FROM participants where status = 'ongoing' and course = \"$t_role\"";
                $query = mysqli_query($database->makeDB(), $sql);
                $results = mysqli_num_rows($query);
                if(mysqli_num_rows($query) > 0){
                    echo "<p class=\"mt-5 text-xs underline\">Students ($results)</p>";
                while($row = mysqli_fetch_array($query)){
                    $full_name = $row["full_name"];
                    echo "<p class='text-xs'>-$full_name</p>";
                    
                }
                }
            
            
            }
            }
            }
            if(isset($_SESSION["s_true"])){
                $_get_files = $_SESSION["s_true"];
                $m_no = $_SESSION["stud_no"];
                $course = $_SESSION["stud_course"];
            
                $sql = "SELECT * FROM teachers where role = \"$course\"";
                $query = mysqli_query($database->makeDB(), $sql);
                if($row = mysqli_fetch_assoc($query)){
                    $t_fname = $row["fname"];
                    $t_lname = $row["lname"];
                    $gender = $row["gender"];
            
                    if($gender == "male"){
                        echo "<p class=\"text-xs underline pl-1\">Host-Teacher</p>
                        <p class=\"text-xs pl-1\">Mr. $t_lname $t_fname</p>";
                    }else{
                        if($gender == "female"){
                            echo "<p class=\"text-xs underline pl-1\">Host-Teacher</p>
                            <p class=\"text-xs pl-1\">Mrs. $t_lname $t_fname</p>";
                        }
                    }
            
                    
                }
                $sql = "SELECT * FROM participants where parti_no = \"$m_no\" and status = 'ongoing'";
                $query = mysqli_query($database->makeDB(), $sql);
                if(mysqli_num_rows($query) > 0){
                    $sql = "SELECT * FROM students where matric_no = \"$m_no\" and course = \"$course\"";
                    $querysrow = mysqli_query($database->makeDB(), $sql);
                    if($srow = mysqli_fetch_assoc($querysrow)){
                        $s_f_name = $srow["fname"];
                        $s_l_name = $srow["lname"];
            
                        echo "
                        <p class=\"text-xs underline pl-1 mt-3\">You</p>
                        <p class=\"text-xs mt-2\">-$s_l_name $s_f_name</p>";
            
                        $sql = "SELECT * FROM participants where status = 'ongoing' and parti_no != \"$m_no\" and course = \"$course\"";
                        $query = mysqli_query($database->makeDB(), $sql);
                        $results = mysqli_num_rows($query);
                        if(mysqli_num_rows($query) > 0){
                            echo "<p class=\"text-xs underline pl-1\">Others ($results)</p>";
                            while($row = mysqli_fetch_array($query)){
                                $full_name = $row["full_name"];
                                echo "<p class='text-xs mt-2'>-$full_name</p>";
                                
                            }
                        }
                        
                    }
                
                    
                        
                    
                
                }
            }
    }
}


// Get Uploaded Documents the teacher uploaded
class getUploadedDocuments
{
    public function __construct(){
        $database = new Database();
        if(isset($_SESSION["t_true"])){
            $_get_files = $_SESSION["t_true"];
            
            $sql = "SELECT * FROM classes where teacher_author = \"$_get_files\" and status = 'ongoing'";
            $query = mysqli_query($database->makeDB(), $sql);
            if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                $pdf = $row["uploadedfile"];
                echo "<a href='pdfs/$pdf' download='$_get_files - class uploads' class='text-blue-500 transition hover:underline duration-200'>$pdf</a>";
            }
            }
            }
            if(isset($_SESSION["s_true"])){
                $_get_files = $_SESSION["s_true"];
                $sql = "SELECT * FROM classes where ongoing_class = \"$_get_files\" and status = 'ongoing'";
            $query = mysqli_query($database->makeDB(), $sql);
            if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_array($query)){
                $pdf = $row["uploadedfile"];
                echo "<a href='pdfs/$pdf' download='$_get_files - class uploads' class= 'text-blue-500 transition hover:underline duration-200'>$pdf</a>";
            }
            }
            }
    }
}

// Check if the class has expired
class ClassExpires
{
    public function __construct($reg_no){
        $database = new Database();
        $sql = "SELECT * FROM classes where teacher_author = \"$reg_no\" and status = 'ongoing'";
    $query = mysqli_query($database->makeDB(), $sql);

    if($cC = mysqli_fetch_assoc($query)){
        $image_name = $cC["uploadedfile"];
        $class = $cC["ongoing_class"];
        $class_id = $cC["class_id"];
        $sql = "UPDATE classes SET status = 'expired' where ongoing_class = \"$class\" and class_id = \"$class_id\"";
        $query = mysqli_query($database->makeDB(), $sql);

        $sqlt = "SELECT * FROM classes_teachers where course = \"$class\" and status = 'ongoing'";
        $queryt = mysqli_query($database->makeDB(), $sqlt);

        if($chCO = mysqli_fetch_assoc($queryt)){
            $chCOID = $chCO["class_t_id"];
            $createDeletePath = "pdfs/$image_name";
            if(unlink($createDeletePath)){
            $sql = "UPDATE classes_teachers SET status = 'expired' where course = \"$class\" and class_t_id = \"$chCOID\"";
        $query = mysqli_query($database->makeDB(), $sql);

        
        header("Location: ../t/?expire");
        }
        }else{
            echo "Invalid Query!";
        }
        
    }
    unset($_SESSION["user"]);
    }
}


//Get Class info, topics...
class getClassInfo
{
    public function __construct(){
        $database = new Database();
        if(isset($_SESSION["t_true"])){
            //Pass reg no of teacher
            $get_class_info = $_SESSION["t_true"];
        
            $sql = "SELECT * FROM classes where teacher_author = \"$get_class_info\" and status = 'ongoing'";
            $query = mysqli_query($database->makeDB(), $sql);
        
            if($row = mysqli_fetch_assoc($query)){
                $class_info = $row["classInfo"];
                $topic = $row["topic"];
                echo "<p class=\"text-xs\">Class Information - $class_info</p>";
                echo "<p class=\"text-xs\">Topic - $topic</p>";
            }
        }
        
        if(isset($_SESSION["s_true"])){
            //Pass reg no of teacher
            $course = $_SESSION["stud_course"];
        
            $sql = "SELECT * FROM classes where ongoing_class = \"$course\" and status = 'ongoing'";
            $query = mysqli_query($database->makeDB(), $sql);
        
            if($row = mysqli_fetch_assoc($query)){
                $class_info = $row["classInfo"];
                $topic = $row["topic"];
                echo "<p class=\"text-xs\">Class Information - $class_info</p>";
                echo "<p class=\"text-xs\">Topic - $topic</p>";
            }
        }
    }
}


//Set teache interface
class teacherSession
{
    public function __construct($reg_no, $now){
        echo "
        <div class=\"w-100 p-4\" style=\"width:100%;\">
            <div class=\"flex flex-col md:flex-row\">
                <div class=\"liveStream w-100 md:w-4/5 h-80 rounded-lg shadow-xl \">
                    
                </div>
                <div class=\"participants w-100 md:w-1/5 h-80 bg-white rounded-lg text-black ml-0 mt-5 md:mt-0 md:ml-5 py-1 px-2\">
    
                    <p class=\"text-center text-xl\">Participants</p>";
                    ?>
                <?php 
                    new getParticipants()
                ?>
                <?php
                echo "
                </div>
            </div>
            <div class=\"md:mt-8 mt-2 rounded text-black flex flex-col md:flex-row py-4\">
                <div class=\"w-100 md:w-4/5 bg-white rounded-lg  p-3 h-60\">
                    <p class=\"text-center\">Class Information</p>"?>
                    <?php new getClassInfo() ?>
                    <?php
                    echo "
                </div>
                <div class=\"w-100 md:w-1/5 mt-5 md:mt-0 md:ml-5 ml-0 pb-3 bg-white rounded-lg shadow-2xl pt-2 px-4\" style=\"position:relative;\">
                    <p class=\"text-center text-xl\">Uploaded Pdfs</p>
                    <p class=\"text-center\">Click the links to download them</p>
                    <p>=>";
                    ?>
                    <?php 
                        new getUploadedDocuments()
                    ?>
                <?php
                echo "</p> 
                </div>
            </div>
        </div>";

    }
}


// Set Student Interface
class StudentSession
{
    public function __construct(){
        $matric_no = $_SESSION["stud_no"];
        $classS = $_SESSION['stud_course'];
        $database = new Database();
        if(isset($_SESSION["s_true"])){
            $sqls = "SELECT * FROM classes where ongoing_class = \"$classS\" and status = 'ongoing'";
            $querys = mysqli_query($database->makeDB(), $sqls);
    
            if($cST = mysqli_fetch_assoc($querys)){
                $cST_t_l = $cST["teacher_login"];
                if($cST_t_l == "no"){
                    
                    header("Location: ../dashboard/?t_handshake");
                    exit();
                }else{
                    echo "
        <div class=\"w-100 p-4\" style=\"width:100%;\">
            <div class=\"flex flex-col md:flex-row\">
                <div class=\"liveStream w-100 md:w-4/5 text-black bg-white flex flex-col h-80 rounded-lg shadow-xl justify-center items-center\">
                    LIVE STREAMING <i class=\"fa fa-podcast\"></i>
                </div>
                <div class=\"participants w-100 md:w-1/5 h-80 bg-white rounded-lg text-black ml-0 mt-5 md:mt-0 md:ml-5 py-1 px-2\">
    
                    <p class=\"text-center text-xl\">Participants</p>";
                    ?>
                <?php 
                    new getParticipants()
                ?>
                <?php
                echo "
                </div>
            </div>
            <div class=\"md:mt-8 mt-2 rounded text-black flex flex-col md:flex-row py-4\">
                <div class=\"w-100 md:w-4/5 bg-white rounded-lg  p-3 h-60\">
                    <p class=\"text-center\">Class Information</p>"?>
                    <?php new getClassInfo() ?>
                    <?php
                    echo "
                </div>
                <div class=\"w-100 md:w-1/5 mt-5 md:mt-0 md:ml-5 ml-0 pb-3 bg-white rounded-lg shadow-2xl pt-2 px-4\" style=\"position:relative;\">
                    <p class=\"text-center text-xl\">Uploaded Pdfs</p>
                    <p class=\"text-center\">Click the links to download them</p>
                    <p>=>";
                    ?>
                    <?php 
                        new getUploadedDocuments()
                    ?>
                <?php
                echo "</p> 
                </div>
            </div>
        </div>";
                }
                    
                
            }else{
            $sql = "SELECT * FROM classes where ongoing_class = \"$classS\" and status = 'expired'";
                    $query = mysqli_query($database->makeDB(), $sql);
                    if(mysqli_num_rows($query) > 0){
                        $sql = "UPDATE participants set status = 'expired' where parti_no = \"$matric_no\" and course = \"$classS\"";
                    $query = mysqli_query($database->makeDB(), $sql);
                    if($query){
                    header("Location: ../t/?expire");
                    exit();
                    }
                    }else{
                        echo '<div class="w-1/6 bg-gray-200 text-white py-4 px-4 h-screen relative" >
                        <div class="bg-black rounded fixed" style="width:300px; height:95vh;">
                            <p class="text-center text-xl fixed bg-black rounded" style="width:300px;">Live Chat</p>
                    
                            <div class="chatShow px-2 mt-16">
                                <div>
                                <div class="sender bg-red-500 w-auto text-left py-1 px-4 rounded-tr-lg rounded-br-lg rounded-tl-lg" style="float:left">
                                    Hey
                                </div>
                                <div class="receiver mt-5 w-auto text-right bg-green-500 py-1 px-4 rounded-tl-lg rounded-bl-lg rounded-tr-lg" style="float:right">
                                    Hi
                                </div>
                                </div>
                            </div>
                    
                            <div class="sendMessage w-100 border-t-2 flex p-2 text-black" style="width:100%;">
                                <input type="text" placeholder="Your Message Here" class="w-60 rounded-tl rounded-bl p-2 outline-none">
                                <button type="submit" class="p-2 text-white rounded-tr rounded-br bg-yellow-400 font-medium w-60">Send <i class="fa fa-send text-white"></i></button>
                            </div>
                            </div>
                        </div>
                        <div class="w-5/6 p-4" style="margin-left:10%;">
                            <div class="text-white flex">
                                <div class="liveStream w-4/5 bg-black flex flex-col h-80 rounded justify-center items-center">
                                    LIVE STREAMING <i class="fa fa-podcast"></i>
                                </div>
                                <div class="participants w-1/5 h-80 bg-black ml-5">
                                    <p class="text-center text-xl">Participants</p>
                                </div>
                            </div>
                            <div class="mt-8 rounded text-white flex py-4">
                                <div class="w-4/5 bg-black rounded p-3 h-60">
                                    <p class="text-center">Class Information</p>
                                </div>
                                <div class="w-1/5 ml-5 bg-black rounded">
                                    <p class="text-center text-xl">Uploaded Pdfs</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
        }else{
            if(isset($_SESSION["stud_id"])){
                header("Location: ../t/?expire");
                exit();
            }else{
                
            
            header("Location: ../t/?expire");
            exit();
            }
            
        }
    }
}