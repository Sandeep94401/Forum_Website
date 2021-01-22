   <div class="error"></div>
<div class="success"></div>
<form>
      <div class="modal-body">
  <div class="mb-3">
<label class="form-label">otp is sent to your Mobile Number</label>
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
  <div class="mb-3">
    <input type="number" class="form-control" id="mobileOtp" placeholder="Enter the Otp">
  </div>
  <input id="verify" type="button" class="form-control" value="Verify" onclick="verifyOtp();">

  <button type="submit" class="btn btn-primary my-2">Submit</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </form>