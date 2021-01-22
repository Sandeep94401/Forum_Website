<?php
$showerror="false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include 'connect.php';
    $loginemail=$_POST['loginemail'];
    $loginpass=$_POST['loginpass'];
    $sql="Select * from users where useremail='$loginemail'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1)
    {
$row=mysqli_fetch_assoc($result);

if(password_verify($loginpass,$row['userpass']))
{
    echo $row['userpass'];

    session_start();
$_SESSION['loggedin']=true;
$_SESSION['id']=$row['sno'];
$_SESSION['useremail']=$loginemail;

}

    header("Location:/forum/index.php");
     }



//header("Location:/forum/index.php");


}
?>