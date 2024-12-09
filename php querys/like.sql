USE site;
UPDATE likes SET quantidade = quantidade + 1
WHERE likes_id = ?;