<?php
	$con = mysqli_connect('127.0.0.1','root','','hv');
	$query = mysqli_query($con, "DELETE FROM zakladli WHERE post_id = " . $_POST['id_post']);
	header("Location: http://hv/zakladki/index.php");
?>