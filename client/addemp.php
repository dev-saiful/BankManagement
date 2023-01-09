<?php include('../inc/header.inc.php'); ?>
    <div class="container">
      <h1 class="text-center">Add Employee</h1>
      <form action="../server/empsignupProcess.php" method="post">
    <div class="mb-3">
    <label for="uname" class="form-label">UserName</label>
    <input type="text" name="uname" class="form-control" id="uname" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" name="cpassword" class="form-control" id="cpassword" required>
  </div>
  <button type="submit" name="signup" class="btn btn-dark">Sign Up</button>
   <a href="adminhome.php" class="btn btn-dark">Home</a>
</form>
    </div>

<?php include('../inc/footer.inc.php'); ?>


