<?php include('../inc/header.inc.php'); ?>
    <div class="container">
      <h1 class="text-center">Login</h1>
      <form action="../server/signinProcess.php" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
  </div>
  <button type="submit" name="signin" class="btn btn-dark">Login</button>
   <a href="signup.php" class="btn btn-dark">Sign Up</a>
   <a href="../index.php" class="btn btn-dark">Home</a>
</form>
    </div>

<?php include('../inc/footer.inc.php'); ?>


