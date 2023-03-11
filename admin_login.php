<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include'config.php';
    $a_name = $_POST["a_name"];
    $a_pass = $_POST["a_pass"]; 
    
     
    $sql = "Select * from `admin` where `a_name`='$_POST[a_name]' AND `a_pass`='$_POST[a_pass]'";
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['a_name'] = $a_name;
        header("location:admin-home.php");

    } 
    else{
        $showError = true;
    }
}

    if($login)
    {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError)
    {
                   echo "<script>alert(' Email or Password is Wrong.')</script>";
    }
?>
