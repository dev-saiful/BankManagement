<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location:signin.php");
}

?>
<?php include('../inc/header.inc.php'); ?>
<h1 class="text-center text-success">Welcome To Bank Dihan</h1>
<h2 class="text-center text-danger">User Panel</h2>
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
          <a class="nav-link active" aria-current="page" href="userhome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../server/signout.php">Sign Out</a>
        </li>      
      </ul>
      
    </div>
  </div>
</nav>
	</div>
	<div class="row">
		<h1 class="text-center text-primary"><?php echo "Welcome ".$_SESSION['username']."!!";?></h1>
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <table class="table text-center table-bordered bg-warning">
      <tr>
        <th>Current Balance</th>
        <th>Account ID</th>
      </tr>
      <tr>
        <td><?php echo $_SESSION['currbal']; ?></td>
        <td><?php echo $_SESSION['account']; ?></td>
      </tr>
    </table>
    </div>
    <div class="col-md-4">
      <div class="text-success">
      <?php 
      if(isset($_GET['success']))
      {
         echo $_GET['success'];
      }
       if(isset($_SESSION['decline']))
      {
         echo $_SESSION['decline'];
      }
      ?>
    </div>
     <form action="../server/sendmoneyPro.php" method="post">
    <div class="mb-3">
    <label for="senderemail" class="form-label">Your Email</label>
    <input type="email" name="senderemail" class="form-control" id="senderemail" required>
    <div class="text-danger">
     <?php 
      if(isset($_GET['sendmail']))
      {
         echo $_GET['sendmail'];
      }
      ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="receiveremail" class="form-label">Receiver Email</label>
    <input type="email" name="receiveremail" class="form-control" id="receiveremail" required>
  </div>
  <div class="text-danger">
     <?php 
      if(isset($_GET['resmail']))
      {
         echo $_GET['resmail'];
      }
      ?>
    </div>
  <div class="mb-3">
    <label for="deposit" class="form-label">Amount</label>
    <input type="number" name="deposit" class="form-control" id="deposit" required>
    <div class="text-danger">
      <?php 
      if(isset($_GET['bala']))
      {
         echo $_GET['bala'];
      }
      ?>
    </div>
  </div>
  <button type="submit" name="addmoney" class="btn btn-dark">Transfer Money</button>
</form>
    </div>
  </div>
</div>

<?php include('../inc/footer.inc.php'); ?>