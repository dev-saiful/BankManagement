<?php include('inc/header.inc.php'); ?>
<h1 class="text-center text-success">Welcome To Bank Dihan</h1>
<div class="container">
	<div class="row">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">BankDihan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="./index.php">Login</a>
        </li>     
      </ul>
    </div>
  </div>
</nav>
	</div>
</div>
    <div class="container">
      <h1 class="text-center">Login</h1>
      <form action="./server/signinProcess.php" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <div class="text-danger">
      <?php
        if(isset($_GET['msg']))
        {
          echo $_GET['msg'];
        }
      ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
    <div class="text-danger">
      <?php
        if(isset($_GET['pass']))
        {
          echo $_GET['pass'];
        }
      ?>
    </div>
  </div>
  <button type="submit" name="signin" class="btn btn-dark">Login</button>
</form>
    </div>
<?php include('inc/footer.inc.php'); ?>
