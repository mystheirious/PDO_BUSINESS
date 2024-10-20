<?php  

function insertPainter($pdo, $first_name, $last_name, 
	$date_of_birth, $art_style, $live_painting_skill) {

	$sql = "INSERT INTO painters (first_name, last_name, 
		date_of_birth, art_style, live_painting_skill) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $art_style, $live_painting_skill]);

	if ($executeQuery) {
		return true;
	}
}



function updatePainter($pdo, $first_name, $last_name, $date_of_birth, $art_style, $live_painting_skill, $painter_id) {

	$sql = "UPDATE painters
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					art_style = ?,
					live_painting_skill = ?
				WHERE painter_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $art_style, $live_painting_skill, $painter_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deletePainter($pdo, $painter_id) {
	$deletePainting = "DELETE FROM paintings WHERE painter_id = ?";
	$deleteStmt = $pdo->prepare($deletePainting);
	$executeDeleteQuery = $deleteStmt->execute([$painter_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM painters WHERE painter_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$painter_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllPainters($pdo) {
	$sql = "SELECT * FROM painters";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getPainterByID($pdo, $painter_id) {
	$sql = "SELECT * FROM painters WHERE painter_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painter_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getAllInfoByPainterID($pdo, $painter_id) {
	$sql = "SELECT * FROM painters WHERE painter_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painter_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}



function getPaintingsByPainter($pdo, $painter_id) {
	
	$sql = "SELECT 
				paintings.painting_id AS painting_id,
				paintings.painting_name AS painting_name,
				paintings.canvas_size AS canvas_size,
				paintings.paint_used AS paint_used,
				paintings.date_added AS date_added,
				CONCAT(painters.first_name,' ',painters.last_name) AS painter,
				paintings.price AS price
			FROM paintings
			JOIN painters ON paintings.painter_id = painters.painter_id
			WHERE paintings.painter_id = ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painter_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertPainting($pdo, $painting_name, $canvas_size, $paint_used, $painter_id, $price) {
	$sql = "INSERT INTO paintings (painting_name, canvas_size, paint_used, painter_id, price) VALUES(?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_name, $canvas_size, $paint_used, $painter_id, $price]);
	if ($executeQuery) {
		return true;
	}




}

function getPaintingByID($pdo, $painting_id) {
	$sql = "SELECT 
				paintings.painting_id AS painting_id,
				paintings.painting_name AS painting_name,
				paintings.canvas_size AS canvas_size,
				paintings.paint_used AS paint_used,
				paintings.price AS price,
				CONCAT(painters.first_name,' ',painters.last_name) AS painter,
				paintings.price AS price,
				paintings.date_added AS date_added
			FROM paintings
			JOIN painters ON paintings.painter_id = painters.painter_id
			WHERE paintings.painting_id  = ? 
			GROUP BY paintings.painting_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updatePainting($pdo, $painting_name, $canvas_size, $paint_used, $price, $painting_id) {
	$sql = "UPDATE paintings
			SET painting_name = ?,
				canvas_size = ?,
				paint_used = ?,
				price = ?
			WHERE painting_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_name, $canvas_size, $paint_used, $price, $painting_id]);

	if ($executeQuery) {
		return true;
	}
}

function deletePainting($pdo, $painting_id) {
	$sql = "DELETE FROM paintings WHERE painting_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$painting_id]);
	if ($executeQuery) {
		return true;
	}
}




?>