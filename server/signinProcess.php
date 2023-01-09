<?php
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	include 'dbconfig.php';
	$inc_pass="";
// form data
	$email = $_POST['email'];
	$password = $_POST['password'];
	// User
	$user_email = "SELECT * FROM `user` WHERE email='$email'";
	$user_query = mysqli_query($conn,$user_email);
	$user_email_row = mysqli_num_rows($user_query);
// Admin
	$admin_email = "SELECT * FROM `admin` WHERE email='$email'";
	$adminQuery = mysqli_query($conn,$admin_email);
	$admin_email_row = mysqli_num_rows($adminQuery);
	// Employee
	$emp_email = "SELECT * FROM `employee` WHERE email='$email'";
	$empQuery = mysqli_query($conn,$emp_email);
	$emp_email_row = mysqli_num_rows($empQuery);
	
// check for validation
	if($admin_email_row)
	{
		$admin_email_pass = mysqli_fetch_assoc($adminQuery);

			$admin_db_pass = $admin_email_pass['password'];
			$_SESSION['adminname']=$admin_email_pass['username'];

			$admin_pass_decode = password_verify($password, $admin_db_pass);
			if($admin_pass_decode)
			{
				//echo "Login";
				header('location:../client/adminhome.php');
			}
			else
			{
				$inc_pass = "Incorrect password";
				header('location:../index.php?pass='.$inc_pass);
			}
	}
	else if($emp_email_row)
	{
		$emp_email_pass = mysqli_fetch_assoc($empQuery);

			$emp_db_pass = $emp_email_pass['password'];
			$_SESSION['empname']=$emp_email_pass['name'];

			$emp_pass_decode = password_verify($password, $emp_db_pass);
			if($emp_pass_decode)
			{
				//echo "Login";
				header('location:../client/emphome.php');
			}
			else
			{
				$inc_pass = "Incorrect password";
				header('location:../index.php?pass='.$inc_pass);

			}
	}
	else if($user_email_row)
	{
		$user_email_pass = mysqli_fetch_assoc($user_query);

			$user_db_pass = $user_email_pass['password'];
			$_SESSION['username']=$user_email_pass['username'];
			$_SESSION['currbal']=$user_email_pass['current_amt'];
			$_SESSION['mail']=$user_email_pass['email'];
			$_SESSION['account']=$user_email_pass['account_id'];

			$user_pass_decode = password_verify($password, $user_db_pass);
			if($user_pass_decode)
			{
				//echo "Login";
				header('location:../client/userhome.php');
			}
			else
			{
				$inc_pass = "Incorrect password";
				header('location:../index.php?pass='.$inc_pass);


			}
	}
	else
	{
		$inv_mail = "Invalid Email";
		header('location:../index.php?msg='.$inv_mail);

	}
}