CREATE DATABASE IF NOT EXISTS site;

USE site;

CREATE TABLE IF NOT EXISTS user(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    email VARCHAR(200) NOT NULL,
    password VARCHAR(255) NOT NULL,
    tipo_de_estatuto ENUM('admin', 'mod', 'user') NOT NULL,
    receber_email BOOL NOT NULL
);

CREATE TABLE IF NOT EXISTS likes(
	likes_id INT PRIMARY KEY AUTO_INCREMENT,
	quantidade INT
);

CREATE TABLE IF NOT EXISTS review(
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    mensagem VARCHAR(400) NOT NULL,
    user_id INT,
    likes_id INT,
    FOREIGN KEY (likes_id) REFERENCES likes(likes_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE IF NOT EXISTS resposta(
    resposta_id INT PRIMARY KEY AUTO_INCREMENT,
    mensagem VARCHAR(400) NOT NULL,
    user_id INT,
    review_id INT,
    likes_id INT,
    FOREIGN KEY (likes_id) REFERENCES likes(likes_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (review_id) REFERENCES review(review_id)
);

CREATE TABLE IF NOT EXISTS texto(
		texto_id INT PRIMARY KEY AUTO_INCREMENT,
        mensagem VARCHAR(500),
        img LONGBLOB
);


-- DROP DATABASE site;
 
 
 
