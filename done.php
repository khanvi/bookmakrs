<?php
	$con = mysqli_connect('127.0.0.1','root','','hv');
	$query = mysqli_query($con,'SELECT * FROM zakladli WHERE post_id = ' . $_POST['id_post']);
	if($query->fetch_assoc()['done'] == 1){
		mysqli_query($con,'UPDATE zakladli SET done = 0 WHERE post_id = ' . $_POST['id_post']);
	}
	else mysqli_query($con,'UPDATE zakladli SET done = 1 WHERE post_id = ' . $_POST['id_post']);
	header("Location: http://hv/zakladki/index.php");
?>