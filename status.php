<?php
	$con = mysqli_connect('127.0.0.1','root','','hv');
	$query = mysqli_query($con, "UPDATE zakladli SET done = 1  WHERE 1");
	header("Location: http://hv/zakladki/index.php");
?>