
<!-- Modal -->
<link href="custom.css" rel="stylesheet">
<div class="container">
<div class="modal fade" id="signupmodal" tabindex="-1" aria-labelledby="signupmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">Sign Up to iDiscuss</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <form action="/forum/handlesignup.php" method="post">
      <div class="modal-body sandy">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="signup" name="signup" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="rpassword" name="rpassword">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
  </div>
 
  <div class="mb-3 contaier">
    <label for="examplenumber" class="form-label">Enter Number</label>
    <input type="number" class="form-control" id="mobile" name="mobile">
  </div>
  <input type="button" class="form-control" value="SendOTP" onClick="sendOtp();">

 
  <button type="submit" class="btn btn-primary my-2">Submit</button>
      </div>
      <div class="error"></div>
<div class="success"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
</form>
      </div>
    </div>
  </div>
  </div>
  <script
  src="jquery-3.2.1.min.js" type="text/javascript">
  </script>
  <script src="verification.js"></script>
  
