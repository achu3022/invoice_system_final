<!-- PHP Login Script -->

<?php
include 'db.php';
    $uname=$_POST["uname"];
    $pass=$_POST["pass"];
    
    $sql="SELECT * FROM invoice_user Where email='$uname' and password='$pass'";
    $result=mysqli_query($con,$sql);
    while($r=mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        if($r)
        {
            $uid=$r["id"];
            session_start();
            $_SESSION["biller"] = "$uname";
            $_SESSION["uid"] = "$uid";
            header("Location:user_home.php");
        }
    }

?>