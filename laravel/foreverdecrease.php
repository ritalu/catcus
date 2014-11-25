#!/usr/bin/php

<?php
	
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

    }

    $pet_query = "SELECT * FROM pets";
    $pet_result = mysql_query($pet_query);

    while ($row = mysql_fetch_assoc($pet_result)) {
        $new_hap = $row['happiness'] - $happiness[$row['typeID']];
        if ($new_hap > 0 ) {
            $hap_query = "UPDATE pets SET happiness = '" . $new_hap . "' WHERE petID = '" . $row['petID'] . "'";
            mysql_query($hap_query);
            echo $hap_query;
        }
        else {
            $hap_query = "UPDATE pets SET happiness = '" . '0' . "' WHERE petID = '" . $row['petID'] . "'";
            mysql_query($hap_query);
        }

        $new_full = $row['fullness'] - $fullness[$row['typeID']];
        if ($new_full > 0) {
            $full_query = "UPDATE pets SET fullness = '" . $new_full . "' WHERE petID = '" . $row['petID'] . "'";
            mysql_query($full_query);
        }
        else {
            $full_query = "UPDATE pets SET fullness = '" . '0' . "' WHERE petID = '" . $row['petID'] . "'";
            mysql_query($full_query);
        }

        $new_clean = $row['cleanliness'] - $cleanliness[$row['typeID']];
        if ($new_clean > 0) {
            $clean_query = "UPDATE pets SET cleanliness = '" . $new_clean . "' WHERE petID = '" . $row['petID'] . "'";
            mysql_query($clean_query);
        }
        else {
            $clean_query = "UPDATE pets SET cleanliness = '" . '0' . "' WHERE petID = '" . $row['petID'] . "'";
            mysql_query($clean_query);
        }
    }



?>