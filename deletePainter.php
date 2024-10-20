<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
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
	<a href="index.php">Return to home</a>
	<h1>Are you sure you want to delete this painter?</h1>
	<?php $getPainterByID = getPainterByID($pdo, $_GET['painter_id']); ?>
	<div class="container" style="border-style: solid; height: 380px; background-color: #F1EBDA;">
		<h2>First Name: <?php echo $getPainterByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getPainterByID['last_name']; ?></h2>
		<h2>Date of Birth: <?php echo $getPainterByID['date_of_birth']; ?></h2>
		<h2>Art Style: <?php echo $getPainterByID['art_style']; ?></h2>
		<h2>Live Painting Skill: <?php echo $getPainterByID['live_painting_skill']; ?></h2>
		<h2>Date Added: <?php echo $getPainterByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?painter_id=<?php echo $_GET['painter_id']; ?>" method="POST">
				<input type="submit" name="deletePainterBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>
