CREATE database "social";

CREATE TABLE screams (
	scream_id int PRIMARY KEY AUTO_INCREMENT,
    content TEXT,
   	FOREIGN KEY (userid) REFERENCES users(userid) ,
    created_date timestamp
)
CREATE TABLE comments (
	comment_id int  PRIMARY KEY AUTO_INCREMENT,
    comment Text,
	scream_id int,
    userid int,
    created_date timestamp
)
CREATE TABLE users (
    user_id int PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    name VARCHAR(255),
    password VARCHAR(255),
)
