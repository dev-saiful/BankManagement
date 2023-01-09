<?php

include 'dbconfig.php';

// Showing All User to Employee and Admin
$trans_sql = "SELECT * FROM `transaction`";
$trans_query = mysqli_query($conn,$trans_sql);
$trans_rows = mysqli_num_rows($trans_query);



if(isset($_POST['approve']))
{
	$ID = $_POST['id'];
	
	// Target id status
$status_sql = "SELECT * FROM `transaction` WHERE id='$ID'";
$run_status_sql = mysqli_query($conn,$status_sql);
$fetch = mysqli_fetch_assoc($run_status_sql);
$sender_mail = $fetch['sender_email'];
$receiver_mail = $fetch['receiver_email'];
$status = $fetch['status'];
$amt = $fetch['amount'];
$amt = (float) $amt;
print_r($status);
// send money code
				if($status==0)
				{
					$db_email = "SELECT email FROM `user` WHERE email='$sender_mail' && email='$receiver_mail'";
					$res_email = mysqli_query($conn,$db_email);
					//$sen_email = mysqli_fetch_assoc($sender_res_email);
					//$final_sen_email = $sen_email['email'];
					// $receiver_db_email = "SELECT email FROM `user` WHERE email = '$receiver_email'";
					// $receiver_res_email = mysqli_query($conn,$receiver_db_email);
					//$rec_email = mysqli_fetch_assoc($receiver_res_email);
					// $rec_email = mysqli_num_rows($receiver_res_email);
					if($res_email)
					{

						$receiver_db_amt = "SELECT current_amt FROM `user` WHERE email='$receiver_mail'";
						$res_receiver_db_amt = mysqli_query($conn,$receiver_db_amt);
						$rows_receiver_db_amt = mysqli_fetch_assoc($res_receiver_db_amt);
						$receiver_db_money = $rows_receiver_db_amt['current_amt'];
						$receiver_db_money = (float) $receiver_db_money;
						//$rows_receiver_db_amt = (float) $rows_receiver_db_amt;
						$receiever_curr_amt = $receiver_db_money + $amt;
						$receiever_curr_amt_query = "UPDATE `user` SET current_amt='$receiever_curr_amt' WHERE email='$receiver_mail'";
						$res_receiever_curr_amt_query = mysqli_query($conn,$receiever_curr_amt_query);
						if($res_receiever_curr_amt_query)
						{
							$sender_db_amt = "SELECT current_amt FROM `user` WHERE email='$sender_mail'";
							$res_sender_db_amt = mysqli_query($conn,$sender_db_amt);
							$rows_sender_db_amt = mysqli_fetch_assoc($res_sender_db_amt);
							$sender_db_money = $rows_sender_db_amt['current_amt'];
							$sender_db_money = (float) $sender_db_money;
							$sender_curr_amt = $sender_db_money - $amt;
							$sender_curr_amt_query = "UPDATE `user` SET current_amt='$sender_curr_amt' WHERE email='$sender_mail'";
							$res_sender_curr_amt_query = mysqli_query($conn,$sender_curr_amt_query);
								if ($res_sender_curr_amt_query) 
					{
						
						// Sender Info
						$cur_send_money_query = "SELECT * FROM `user` WHERE email='$sender_mail'";
						$run_sql = mysqli_query($conn,$cur_send_money_query);
						$sender_db_money = mysqli_fetch_assoc($run_sql);
						$_SESSION['currbal'] = $sender_db_money['current_amt'];
						// Receiver Info
						// $cur_res_money_query = "SELECT * FROM `user` WHERE email='$receiver_email'";
						// $run_sql2 = mysqli_query($conn,$cur_res_money_query);
						// $receiver_db_money = mysqli_fetch_assoc($run_sql2);
						// $_SESSION['currbal'] = $receiver_db_money['current_amt'];
						//$_SESSION['username'] = $sender_db_money['username'];
						$status = 1;
						$sql = "UPDATE `transaction` SET status='$status' WHERE id='$ID'";
						$run_sql_status = mysqli_query($conn,$sql);

						$_SESSION['status'] = $status;
						//$success = "Money Transfered Request sent Successfully";
						header("location:../client/adminhome.php");
					}
					else
					{
						
						$failmsg = "Failed To transfer money";
						header("location:../client/adminhome.php?failmsg=".$failmsg);
					}
						}
					}
					else
					{
						$worng = "Something went wrong";
						header("location:../client/adminhome.php?worng=".$worng);
					}

				}


}

if(isset($_POST['decline']))
{
	$del_ID = $_POST['id'];
	$del = "DELETE FROM `transaction` WHERE id='$del_ID'";
	$del_run = mysqli_query($conn,$del);
	if($del_run)
	{
		header("location:../client/adminhome.php");
	}
}


