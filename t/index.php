
<?php 
if(isset($_GET["expire"])){
    session_start();
    
    unset($_SESSION["t_true"]);
    unset($_SESSION["s_true"]);

    // echo "<div class=\"bg-white shadow-2xl m-auto flex flex-col space-y-5 items-center p-5 rounded-lg\" style=\"width:300px;\">";
    // echo "<div><i class=\"fa fa-info-circle fa-3x text-yellow-500\"></i></div>";
    // echo "<div class=\"font-bold text-2xl text-center\">This Class session has expired!</div>";
    // echo "<a href=\"../dashboard\" class=\"font-medium transition hover:underline\">Go back to Dashboard</a>";
    // echo "</div>";
    echo "e";

}
if(isset($_GET["expiret"])){
    session_start();
    unset($_SESSION["t_true"]);
    unset($_SESSION["s_true"]);
    echo "<div class=\"bg-white shadow-2xl m-auto flex flex-col space-y-5 items-center p-5 rounded-lg\">";
    echo "<div><i class=\"fa fa-info-circle fa-3x text-yellow-500\"></i></div>";
    echo "<div class=\"font-bold text-2xl\">The Class you created has expired!</div>";
    echo "<a href=\"../dashboard\" class=\"font-medium transition hover:underline\">Go back to Dashboard</a>";
    echo "</div>";
}
if(isset($_GET["t_handshake"])){
    echo "<div class=\"bg-white shadow-2xl m-auto flex flex-col space-y-5 items-center p-5 rounded-lg\">";
    echo "<div><i class=\"fa fa-info-circle fa-3x text-yellow-500\"></i></div>";
    echo "<div class=\"font-bold text-2xl\">Your Teacher hasn't logged in yet!</div>";
    echo "<a href=\"../dashboard\" class=\"font-medium transition hover:underline\">Go back to Dashboard</a>";
    echo "</div>";
}

if(isset($_GET["echo"])){
    echo "Oops you!";
}
?>


