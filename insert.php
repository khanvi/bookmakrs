<?php
	$con = mysqli_connect('127.0.0.1','root','','hv');
	$query = mysqli_query($con, "INSERT INTO zakladli (text,done,date) 
		VALUES ('". $_POST['text']."'," . 1 . ",'" . $_POST['date'] . "')");
	header("Location: http://hv/zakladki/index.php");
?>