<?php
        header( 'Location: ./index.php');
	$seq_id = trim($_POST['q_id']);
	$seq_rate = trim($_POST['q_rate']);
	//echo $seq_id;
	//echo $seq_rate;
	$conn = mysql_connect("localhost", "root", "password");
	mysql_select_db("jigsaw",$conn);
	//SELECT * FROM user_rating ORDER BY bar_id DESC LIMIT 1;
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	//first update the counting
	$sqlfst="UPDATE user_rating SET count_rate_time = (count_rate_time + 1) WHERE bar_id = '".$seq_id."'";
	mysql_query($sqlfst);
	//update the rating result
	$sqlsnd = "UPDATE user_rating SET bar_rating = (bar_rating + '".$seq_rate."') WHERE bar_id = '".$seq_id."'";
        mysql_query($sqlsnd);
	
        if($bar_prog > 0)//array_key_exists('bar_prog', $GLOBALS))
        {
                $bar_prog = $bar_prog+20;
                if($bar_prog>100)
                        {$bar_prog= $bar_prog-100;}
		else{ $bar_prog= $bar_prog;}
        }else{
                $GLOBALS['bar_prog'] = 20;
        }
	//echo $bar_prog;
        mysql_close($conn);
?>
