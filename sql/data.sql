CREATE TABLE painters (
    painter_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_of_birth VARCHAR (50),
    art_style TEXT,
    live_painting_skill INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE paintings (
    painting_id INT AUTO_INCREMENT PRIMARY KEY,
    painting_name VARCHAR (50),
    canvas_size VARCHAR (50),
    paint_used VARCHAR (50),
    painter_id INT,
    price VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);