<?php
$showerror="false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include 'connect.php';
    $useremail=$_POST['signup'];
    $pass=$_POST['rpassword'];
    $cpass=$_POST['cpassword'];
$exists="SELECT * FROM `users` WHERE useremail='$useremail'";
$result=mysqli_query($conn,$exists);
$num=mysqli_num_rows($result);
if($num>0)
{
    $showerror="email already in use";

echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Email already exists!</strong> Try another email account
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}



else
{
if($pass == $cpass)
{
    $hash=password_hash($pass,PASSWORD_DEFAULT);
    $sql="INSERT INTO `users` ( `useremail`, `userpass`, `timestamp`)
     VALUES ( '$useremail', '$hash', current_timestamp())";
$result=mysqli_query($conn,$sql);

{
    $showalert=true;
   header("Location:index.php?signupsuccess=true");
    exit();
}

}
else
{
    $showerror="password do not match";
    
}
}

header("Location :index.php:?signupsuccess=false&error=$showerror");

}
?>