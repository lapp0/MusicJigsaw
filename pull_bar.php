<?php
	$conn = mysql_connect("localhost", "root", "password");
	mysql_select_db("jigsaw",$conn);
        if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	//first update the counting
	$sqlfst="SELECT bar_id FROM bar_queue LIMIT 1";
	$fffetch=mysql_query($sqlfst); //or die(mysql_error());
	//update the rating result
	$sqlsnd = "DELETE FROM bar_queue LIMIT 1";
	mysql_query($sqlsnd);
        mysql_close($conn);
        $query_row = mysql_fetch_array($fffetch);
        echo($query_row[0]);
?>
