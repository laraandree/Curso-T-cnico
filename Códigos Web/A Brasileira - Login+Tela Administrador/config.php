<?php
	$con = mysql_connect ('localhost','root','');
	$db = mysql_select_db ('combo');
	
	if (!$con || !$db)
	{
		echo "<pre>";
		echo mysql_error ();
		echo "</pre>";
	}
?>