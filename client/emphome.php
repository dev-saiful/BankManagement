<?php
session_start();
if(!isset($_SESSION['empname']))
{
	header("location:signin.php");
}

?>
<?php include('../inc/header.inc.php'); ?>
<h1 class="text-center text-success">Welcome To Bank Dihan</h1>
<h2 class="text-center text-danger">Employee Panel</h2>
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
          <a class="nav-link active" aria-current="page" href="emphome.php">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../client/signup.php">Add User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../server/empsignout.php">Sign Out</a>
        </li>      
      </ul>
      
    </div>
  </div>
</nav>
	</div>
	<div class="row">
		<h1 class="text-center text-primary"><?php echo "Welcome ".$_SESSION['empname']."!!";?></h1>
	</div>
</div>
<div class="container">
  <div class="row">
     <table class="table table-bordered">
      <tr>
        <th>UserName</th>
        <th>Email</th>
        <th>Account ID</th>
        <th>Balance</th>
      </tr>
    <?php include '../server/userlist.php'; 
    if($rows)
    {
      while($res = mysqli_fetch_assoc($query))
     {?>
      <tr>
        <td><?php echo $res['username'];?></td>
        <td><?php echo $res['email'];?></td>
        <td><?php echo $res['account_id'];?></td>
        <td><?php echo $res['current_amt'];?></td>
      </tr>
     <?php
     }
    ?>
  </table>
  <?php  }
    else
    {
      echo "No Data Found!!!";
    }

      ?>
   
  </div>
</div>

<?php include('../inc/footer.inc.php'); ?>