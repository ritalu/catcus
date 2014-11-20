<?php
	set_time_limit(0);
// while(true)
// {
	$con = mysql_connect('104.236.63.166', 'root', 'password') or die("unable to connect");

	@mysql_select_db('laravel') or die('Could not open the db');

	$query = "SELECT * FROM pettypes";
	$result = mysql_query($query);

	$happiness = array();
	$fullness = array();
	$cleanliness = array();


	while ( $row = mysql_fetch_assoc($result) ) {
    	$happiness[$row['typeID']] = $row['rate_decrease_hap'];
    	$fullness[$row['typeID']] = $row['rate_decrease_full'];
    	$cleanliness[$row['typeID']] = $row['rate_decrease_clean'];
    	// echo $happiness[$row['typeID']] . ' ';
    	// echo $fullness[$row['typeID']] . ' ';
    	// echo $cleanliness[$row['typeID']] . ' ';
    	// echo " --------- ";
    }

    $uquery1 = "UPDATE pet SET ";

    foreach ($happiness as $key => $value)
    {
    	echo $happiness[$key];
    	$uquery = "UPDATE pet SET ";
    }

    //avoid CPU exhaustion, adjust as necessary
    //usleep(2000);//0.002 seconds
//}


?>