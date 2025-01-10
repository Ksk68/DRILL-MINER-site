SET sql_safe_updates = 0;

UPDATE user SET Tipo_de_estatuto = 'admin' WHERE nome = ?;