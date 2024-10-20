<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
	body {
			font-family: "system-ui";
			background-color: #FDE0DF;
		}
	input {
			font-size: 1.5em;
			height: 40px;
			width: 200px;
			background-color: #FDE0DF;
		}
</style>
<body>
	<?php $getPaintingByID = getPaintingByID($pdo, $_GET['painting_id']); ?>
	<h1>Are you sure you want to delete this painting?</h1>
	<div class="container" style="border-style: solid; height: 380px; background-color: #F1EBDA;">
		<h2>Painting Name: <?php echo $getPaintingByID['painting_name'] ?></h2>
		<h2>Canvas Size: <?php echo $getPaintingByID['canvas_size'] ?></h2>
		<h2>Paint Used: <?php echo $getPaintingByID['paint_used'] ?></h2>
		<h2>Painter: <?php echo $getPaintingByID['painter'] ?></h2>
		<h2>Price: <?php echo $getPaintingByID['price'] ?></h2>
		<h2>Date Added: <?php echo $getPaintingByID['date_added']; ?></h2>
		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?painting_id=<?php echo $_GET['painting_id']; ?>&painter_id=<?php echo $_GET['painter_id']; ?>" method="POST">
				<input type="submit" name="deletePaintingBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>
