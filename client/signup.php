<?php include('../inc/header.inc.php'); ?>
    <div class="container">
      <h1 class="text-center">Registration</h1>
      <form action="../server/signupProcess.php" method="post">
    <div class="mb-3">
    <label for="username" class="form-label">UserName</label>
    <input type="text" name="username" class="form-control" id="username" required>
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
  <div class="mb-3">
    <label for="account_id" class="form-label">Account ID</label>
    <input type="text" name="account_id" class="form-control" id="account_id" required>
  </div>
  <div class="mb-3">
    <label for="amount" class="form-label">Balance</label>
    <input type="number" name="amount" class="form-control" id="amount" required>
  </div>
  <button type="submit" name="signup" class="btn btn-dark">Sign Up</button>
   <a href="emphome.php" class="btn btn-dark">Home</a>
</form>
    </div>

<?php include('../inc/footer.inc.php'); ?>


