<?php

	$conn = mysqli_connect("localhost", "root","", "campus");

	if (!$conn) 
	{
		echo("Connection failed: " . mysqli_connect_error());
	}
?>