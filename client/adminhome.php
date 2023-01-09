<?php
session_start();
if(!isset($_SESSION['adminname']))
{
	header("location:signin.php");
}

?>
<?php include('../inc/header.inc.php'); ?>
<h1 class="text-center text-success">Welcome To Bank Dihan</h1>
<h2 class="text-center text-danger">Admin Panel</h2>
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
          <a class="nav-link active" aria-current="page" href="adminhome.php">Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../client/addemp.php">Add Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../server/adminsignout.php">Sign Out</a>
        </li>      
      </ul>
      
    </div>
  </div>
</nav>
	</div>
	<div class="row">
		<h1 class="text-center text-primary"><?php echo "Welcome ".$_SESSION['adminname']."!!";?></h1>
	</div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h3 class="text-center text-warning">User Info</h3>
     <table class="table table-bordered">
      <tr>
        <th>UserName</th>
        <th>Email</th>
      </tr>
    <?php include '../server/userlist.php'; 
    if($rows)
    {
      while($res = mysqli_fetch_assoc($query))
     {?>
      <tr>
        <td><?php echo $res['username'];?></td>
        <td><?php echo $res['email'];?></td>
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
    <div class="col-md-6">
      <h3 class="text-center text-warning">Employee Info</h3>
     <table class="table table-bordered">
      <tr>
        <th>UserName</th>
        <th>Email</th>
      </tr>
    <?php  
    if($emp_rows)
    {
      while($res_emp = mysqli_fetch_assoc($run_query))
     {?>
      <tr>
        <td><?php echo $res_emp['name'];?></td>
        <td><?php echo $res_emp['email'];?></td>
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
</div>
<div class="container">
  <div class="row">
    <h3 class="text-center text-warning">Transaction Info</h3>
     <table class="table table-bordered">
      <tr class="text-center">
        <th>Sender Email</th>
        <th>Receiver Email</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    <?php include '../server/transData.php'; 
    if($trans_rows)
    {
      while($trans_res = mysqli_fetch_assoc($trans_query))
     {?>
      <tr class="text-center">
        <td><?php echo $trans_res['sender_email'];?></td>
        <td><?php echo $trans_res['receiver_email'];?></td>
        <td><?php echo $trans_res['amount'];?></td>
        <td>
          <?php 
          if($trans_res['status']==0)
          {
            echo "Pending";
          } 
          else
          {
             echo "Approved";
          }

            ?>
          
        </td>
        <td>
          <form action="../server/transData.php" method="post">
            <input type="hidden" name="id" value="<?php echo $trans_res['id'];?>">
            <input class="btn btn-success" value="Approve" type="submit" name="approve">
            <input class="btn btn-danger" value="Decline" type="submit" name="decline">  
          </form>
        </td>
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