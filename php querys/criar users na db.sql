
USE site;

GRANT SELECT, INSERT, UPDATE ON `site`.* TO 'teste'@'localhost' IDENTIFIED BY '12345678';


SHOW GRANTS FOR 'teste'@'localhost';

DROP USER 'teste'@'localhost';
