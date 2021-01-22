<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>iDOCS!</title>
  </head>
  <body>
<?php include 'header.php'; ?>
<?php include 'connect.php'; ?>

<!--slider-->

<?php
$id=$id = isset($_GET['catid']) ? $_GET['catid'] : '';
$sql="SELECT * FROM `catogiries`  WHERE catagory_id='$id'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result))
{
  $cat=$row['catagory_name'];
  $desc=$row['catagory_description'];

}
?>


<?php
$method=$_SERVER['REQUEST_METHOD'];
echo $method;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $th_title=$_POST['title'];
  $th_desc=$_POST['desc'];
  $sno=$_POST['sno'];
  $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_catid`, `thread_userid`, `timestamp`) 
  VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
$result=mysqli_query($conn,$sql);
}
?>


<div class="container my-4">

<div class="jumbotron bg-light">
  <h1 class="display-4"> <?php echo (isset($cat)) ? $cat : ''; ?> </h1><br>
  <p class="lead"> <?php echo (isset($desc)) ? $desc : ''; ?>  </p>
  <hr class="mx-4">

  <p>    No Spam / Advertising / Self-promote in the forums. ...<br>
    Do not post copyright-infringing material. ...<br>
    Do not post “offensive” posts, links or images. ...<br>
    Do not cross post questions. ...<br>
    </p>
  <p class="lead"><b>host:sandeep</b></p>
</div>
</div>
<h1 class="container">Start a Discussions</h1>
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '<div class="container">

<form action=" ' .  $_SERVER["REQUEST_URI"] . ' " method ="post">
  <div class="form-group">
    <label for="exampleInputEmail1">thread titles</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">keep your title as small as possible.</small>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Elobrate your concern</label>
    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    <input type="hidden" name="sno" value="' . $_SESSION['id'] . '">

    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>';
}
else
{
  echo '<div class="alert alert-primary" role="alert">
  
  you are not logged in!
</div>';
}


?>
<div class="container">
<h1 class="py-2">browse questions</h1>

<?php   
$id=$id = isset($_GET['catid']) ? $_GET['catid'] : '';
$sql="SELECT * FROM `threads` WHERE thread_catid='$id'"; 
$result=mysqli_query($conn,$sql);
$noresult=true;
while($row=mysqli_fetch_assoc($result))
{
  $noresult=false;
  $id=$row['thread_id'];
  $title=$row['thread_title'];
  $desc=$row['thread_desc'];
  $ttime=$row['timestamp'];
  $userpost=$row['thread_userid'];
  $sql2="SELECT * FROM `users` WHERE sno='$userpost'"; 
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);
echo '<div class="media">
<img class="mr-3" src="user.png" width="54px" alt="Generic placeholder image">
<div class="media-body">
<p class="font-weight-bold my-0"> ' . $row2['useremail'] . ' at ' . $ttime . '</p>
  <h5 class="mt-0"><a href="singlethread.php?threadid= ' . $id . '"> ' . $title . ' </a></h5>
' . $desc . '
  </div>
</div>';
}
if($noresult)
{
  echo '<div class="jumbotron jumbotron-fluid" bg-light>
  <div class="container">
    <h1 class="display-4">No Queries to Find</h1>
    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>';
}

?>










 
</div>



 

<?php include 'footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
