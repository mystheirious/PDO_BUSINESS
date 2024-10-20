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
			background-color: #F1EBDA;
		}
	select {
			background-color: #F1EBDA;
	}
</style>
<body>
	<h1>⁺₊✧ Welcome to the Painting Booth! Kindly fill out to add a painter ✧₊⁺ </h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" required>
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" required>
		</p>
		<p>
		    <label for="artStyle">Art Style</label> 
		    <select name="artStyle" id="artStyle" required>
		        <option value="">Select art style</option>
		        <option value="Abstract">Abstract</option>
		        <option value="Expressionism">Impressionism</option>		        
		        <option value="Realism">Realism</option>
		        <option value="Impressionism">Surrealism</option>
		        <option value="Painterly">Painterly</option>
		        <option value="Pop Art">Pop Art</option>
		    </select>
		</p>
		<p>
		    <label for="livePaintingSkill">Live Painting Skill (0-5):</label>
		    <select name="livePaintingSkill" id="livePaintingSkill" required>
		        <option value="">Select skill level</option>
		        <option value="1">1</option>
		        <option value="2">2</option>
		        <option value="3">3</option>
		        <option value="4">4</option>
		        <option value="5">5</option>
		    </select>
		</p>
		<p>
		    <input type="submit" name="insertPainterBtn">
		</p>
	</form>
	<?php $getAllPainters = getAllPainters($pdo); ?>
	<?php foreach ($getAllPainters as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 360px; margin-top: 15px; background-color: #F1EBDA;
">
		<h3>Painter's ID: <?php echo $row['painter_id']; ?></h3>
		<h3>First Name: <?php echo $row['first_name']; ?></h3>
		<h3>Last Name: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Art Style: <?php echo $row['art_style']; ?></h3>
		<h3>Live Painting Skill: <?php echo $row['live_painting_skill']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewpaintings.php?painter_id=<?php echo $row['painter_id']; ?>">View paintings</a>
			<a>⟡</a>
			<a href="editPainter.php?painter_id=<?php echo $row['painter_id']; ?>">Edit</a>
			<a>⟡</a>
			<a href="deletePainter.php?painter_id=<?php echo $row['painter_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>