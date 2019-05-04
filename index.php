<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div style="height: 100px">
	</div>
	<div class="container bg-light">
	<?php
		$con = mysqli_connect('127.0.0.1','root','','hv');
		$query = mysqli_query($con,"SELECT * FROM zakladli ORDER BY post_id DESC");
	?>
		<form method="POST" action="insert.php" enctype="multipart/form-data">
			<h5> Добавить пост </h5>
			<textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3" name="text" placeholder="текст" >
			</textarea>
			<input type="date" id="date" name="date">
			<button class="btn btn-primary">OK</button>
		</form>
		<hr>
		<div class="row">
			<h2 class="col-3"> Дата </h2>
			<h2 class="col-6"> Что нужно сделать ? </h2>
			<h2 class="col-3"></h2>
		</div>
		<?php
			for($i = 0; $i < $query->num_rows; $i++){
				$rec = $query->fetch_assoc();
		?>
					<div class="row">
						<h2 class="col-3">
							<?php echo $rec['date'] ?>
						</h2>
						<div class="col-6 pl-2 pt-2">
							<h6 class="col-6 w1" <?php if($rec['done']==1) echo 'style="color: red"';
												else echo 'style="color: green"';
								?> > 
								<?php echo $rec['text'] ?> 
							</h6>
							<form method="POST" action="update.php" enctype="multipart/form-data" class="w2" style="display: none">
								<div class="input-group">
									<input type="text" name="text" <?php echo 'value="'.$rec['text'].'"' ?> class="form-control">
									<?php
										echo '<input type="hidden" name="id_post" value="' . $rec['post_id'] . '">';
									?>
									<button class="btn btn-danger"> update </button>
								</div>
							</form>
						</div>
						<h2 class="col-3">
							<form method="POST" action="done.php" enctype="multipart/form-data">
								<?php
									echo '<input type="hidden" name="id_post" value="' . $rec['post_id'] . '">';
								?>
								<button class="btn btn-success"> done </button>
							</form>
							<form method="POST" action="delete.php" enctype="multipart/form-data">
								<?php
									echo '<input type="hidden" name="id_post" value="' . $rec['post_id'] . '">';
								?>
								<button class="btn btn-danger"> delete </button>
							</form>
						</h2>
					</div>
		<?php } ?>
	</div>
</body>
<script type="text/javascript">
	let w1 = document.querySelector('.w1');
	let w2 = document.querySelector('.w2');
	w1.onclick= function(){
		w2.style.display = 'block';
		w1.style.display = 'none';
	}
</script>
</html>