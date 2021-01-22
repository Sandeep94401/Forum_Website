<?php
session_start();
include 'connect.php';

echo
'<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-light" >
<div class="container-fluid">
  <a class="navbar-brand" href="/forum">IDiscuss</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Catogiries
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
$sql="SELECT catagory_name,catagory_id FROM `catogiries`";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{

      echo '<li><a class="dropdown-item" href="threads.php?catid=' .$row['catagory_id']. '">' . $row['catagory_name'] . '</a></li>';
}
 

echo '</ul>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="contact.php" tabindex="-1" aria-disabled="true">Contact</a>
      </li>
    </ul>
    <div class= "row mx-2" >';

    if(isset($_SESSION['loggedin']) ==true && $_SESSION['loggedin'])
{ 
  
  
  echo '<form class="d-flex" action="search.php" method="get">
  <input class="form-control  mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

<p class="text-light my-0 mx-2"> welcome ' . $_SESSION['useremail'] . '</p>
<a href="logout.php" class="btn btn-primary ml-2" >Logout</a>
</form>
'; 

}

else{

 echo '<form class="d-flex">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>

<button class="btn btn-primary ml-2 " data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
<button class="btn btn-primary mx-2 " data-bs-toggle="modal" data-bs-target="#signupmodal">Sign UP</button>'; 

}
   echo '</div>
</div>
</nav>';
include 'loginmodal.php';
include 'signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']==true)
{
echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Success!</strong> You can now login.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>