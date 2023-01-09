<?php

include 'dbconfig.php';

// Showing All User to Employee and Admin
$sql = "SELECT * FROM `user`";
$query = mysqli_query($conn,$sql);
$rows = mysqli_num_rows($query);

// 

// Showing  ALL Employee to Admin

$emp_query = "SELECT * FROM `employee`";
$run_query = mysqli_query($conn,$emp_query);
$emp_rows = mysqli_num_rows($run_query);