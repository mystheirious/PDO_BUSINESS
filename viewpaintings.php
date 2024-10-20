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
			background-color: #F1EBDA;
		}
	select {
			background-color: #F1EBDA;
		}
	table, th, td {
			border:1px solid black;
			background-color: #F1EBDA;
		}
</style>
<body>
	<a href="index.php">Return to home</a>
	<?php $getAllInfoByPainterID = getAllInfoByPainterID($pdo, $_GET['painter_id']); ?>
	<h1>Painter ID: <?php echo $getAllInfoByPainterID['painter_id']; ?></h1>
	<h3>Add a new painting to <?php echo $getAllInfoByPainterID['first_name']; ?>'s collection ౨ৎ</h3>
	<form action="core/handleForms.php?painter_id=<?php echo $_GET['painter_id']; ?>" method="POST">
		<p>
			<label for="paintingName">Painting Name</label> 
			<input type="text" name="paintingName" required>
		</p>
		<p>
		    <label for="canvasSize">Canvas Size</label> 
		    <select name="canvasSize" id="canvasSize" required>
		        <option value="">Select canvas size</option>
		        <option value="8x10 inches">8 x 10 inches</option>
		        <option value="11x14 inches">11 x 14 inches</option>
		        <option value="16x20 inches">16 x 20 inches</option>
		    </select>
		</p>
		<p>
		    <label for="paintUsed">Type of Paint</label> 
		    <select name="paintUsed" id="paintUsed" required>
		        <option value="">Select paint type</option>
		        <option value="Acrylic Paint">Acrylic Paint</option>
		        <option value="Gouache Paint">Gouache Paint</option>
				<option value="Oil Paint">Oil Paint</option>
		        <option value="Pastel Paint">Pastel Paint</option>		        
		        <option value="Watercolor Paint">Watercolor Paint</option>
		    </select>
		</p>
		<p>
			<label for="price">Price (PHP)</label> 
			<input type="text" name="price">
		</p>
		<p>
			<input type="submit" name="insertNewPaintingBtn" required>
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Painting ID</th>
	    <th>Painting Name</th>
	    <th>Canvas Size</th>
	    <th>Paint Used</th>
	    <th>Painter</th>
	    <th>Price</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getPaintingsByPainter = getPaintingsByPainter($pdo, $_GET['painter_id']); ?>
	  <?php 
	    if (empty($getPaintingsByPainter)) {
    	    echo "<tr><td colspan='8'>No paintings found for this painter.</td></tr>";
    	} 
		?>
	  <?php foreach ($getPaintingsByPainter as $row) { ?>
	  <tr>
	  	<td><?php echo $row['painting_id']; ?></td>	  	
	  	<td><?php echo $row['painting_name']; ?></td>	  	
	  	<td><?php echo $row['canvas_size']; ?></td>	  	
	  	<td><?php echo $row['paint_used']; ?></td>	  	
	  	<td><?php echo $row['painter']; ?></td>	  	
	  	<td><?php echo $row['price']; ?></td>	  
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editPainting.php?painting_id=<?php echo $row['painting_id']; ?>&painter_id=<?php echo $_GET['painter_id']; ?>">Edit</a>
			<a>⟡</a>
	  		<a href="deletePainting.php?painting_id=<?php echo $row['painting_id']; ?>&painter_id=<?php echo $_GET['painter_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>