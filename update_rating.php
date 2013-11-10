<?php
	$seq_id = trim($_GET['q_id']);
	$seq_rate = trim($_GET['q_rate']);
	$con = new mysqli("localhost", "root", "password", "jigsaw");
	//SELECT * FROM user_rating ORDER BY bar_id DESC LIMIT 1;
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	//first update the counting
	$sql="UPDATE user_rating SET count_rate_time = count_rate_time + 1 WHERE bar_id = '$seq_id'"; 
	mysql_query($sql,$con);
	//update the rating result
	$2nd_sql = "UPDATE user_rating SET bar_rating = (bar_rating + '$seq_rate')/count_rate_time WHERE bar_id = '$seq_id'"; 
	mysql_query($2nd_sql, $con);
	mysql_close($con);
?>