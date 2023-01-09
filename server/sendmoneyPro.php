<?php

session_start();
if($_SERVER['REQUEST_METHOD']=='POST')
{
	include 'dbconfig.php';
// form data
	$sender_email = mysqli_real_escape_string($conn, $_POST['senderemail']);
	$receiver_email = mysqli_real_escape_string($conn, $_POST['receiveremail']);
	$send_amount = mysqli_real_escape_string($conn, $_POST['deposit']);
	$send_amount = (float) $send_amount;
	if($sender_email==$_SESSION['mail'])
	{
		//echo gettype($send_amount);
		// check valid email
		$sender_db_email = "SELECT email FROM `user` WHERE email='$sender_email'";
		$sender_res_email = mysqli_query($conn,$sender_db_email);
		//$sen_email = mysqli_fetch_assoc($sender_res_email);
		//$final_sen_email = $sen_email['email'];
		$receiver_db_email = "SELECT email FROM `user` WHERE email = '$receiver_email'";
		$receiver_res_email = mysqli_query($conn,$receiver_db_email);
		//$rec_email = mysqli_fetch_assoc($receiver_res_email);
		$rec_email = mysqli_num_rows($receiver_res_email);
		//$final_rec_email = $rec_email['email'];
		
		if($rec_email>0)
		{
			// check balance
			$sender_db_amt = "SELECT current_amt FROM `user` WHERE email='$sender_email'";
			$res_sender_db_amt = mysqli_query($conn,$sender_db_amt);
			$rows_sender_db_amt = mysqli_fetch_assoc($res_sender_db_amt);
			//print_r($rows_sender_db_amt);
			//echo gettype($rows_sender_db_amt);
			$sender_db_money = $rows_sender_db_amt['current_amt'];
			$sender_db_money = (float) $sender_db_money;
			//echo gettype($sender_db_money);
			//print_r($sender_db_money);
			//$res_sender_db_amt = (float)$res_sender_db_amt;
			if($send_amount<=$sender_db_money && $send_amount > 0 )
			{
				// transaction request
				$trans_query = "INSERT INTO `transaction`(sender_email,receiver_email,amount) values('$sender_email','$receiver_email','$send_amount') ";
				$trans_res = mysqli_query($conn,$trans_query);
				if($trans_res)
				{
					$success = "Money Transfered Request sent Successfully";
					header("location:../client/userhome.php?success=".$success);
				}
				// Transaction status from TransData.php file and transaction table
				else
				{
					$dec = "Money Transfered Request Not Granted!!!";
					header("location:../client/userhome.php?dec=".$dec);
				}



			}
			else
			{
				
				$bala = "Insufficient Balance";
				header("location:../client/userhome.php?bala=".$bala);
				
			}
		}
		else
		{
			//print_r($rows_sender_db_amt);
			$resmail = "Receiver Email Invalid";
			header("location:../client/userhome.php?resmail=".$resmail);
			
		}
	

	}
	else
	{
		$sendmail = "Sender Email Invalid";
		header("location:../client/userhome.php?sendmail=".$sendmail);
	}

	

}
