<?php require_once 'core/handleForms.php'; ?>
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
			background-color: #F1EBDA;
		}
</style>
<body>
	<a href="index.php">Return to home</a>
	<?php $getPainterByID = getPainterByID($pdo, $_GET['painter_id']); ?>
	<h1>Modify painter details ⭑.ᐟ</h1>
	<form action="core/handleForms.php?painter_id=<?php echo $_GET['painter_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getPainterByID['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getPainterByID['last_name']; ?>">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo $getPainterByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="artStyle">Art Style</label> 
			<input type="text" name="artStyle" value="<?php echo $getPainterByID['art_style']; ?>">
		</p>
		<p>
			<label for="livePaintingSkill">Live Painting Skill</label> 
			<input type="text" name="livePaintingSkill" value="<?php echo $getPainterByID['live_painting_skill']; ?>">
		</p>
		<p>
			<input type="submit" name="editPainterBtn">
		</p>
	</form>
</body>
</html>
