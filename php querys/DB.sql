CREATE DATABASE IF NOT EXISTS site;

USE site;

CREATE TABLE IF NOT EXISTS user(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    email VARCHAR(45) NOT NULL,
    password VARCHAR(45) NOT NULL,
    tipo_de_estatuto ENUM('admin', 'mod', 'user') NOT NULL
);

CREATE TABLE IF NOT EXISTS review(
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    mensagem VARCHAR(400) NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

CREATE TABLE IF NOT EXISTS resposta(
    resposta_id INT PRIMARY KEY AUTO_INCREMENT,
    mensagem VARCHAR(400) NOT NULL,
    user_id INT,
    review_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (review_id) REFERENCES review(review_id)
);

CREATE TABLE IF NOT EXISTS likes(
	likes_id INT PRIMARY KEY AUTO_INCREMENT,
	quantidade INT,
    
    user_id INT,
    review_id INT,
    resposta_id INT,
    
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (review_id) REFERENCES review(review_id),
    FOREIGN KEY (resposta_id) REFERENCES resposta(resposta_id)
);

 -- DROP DATABASE site;