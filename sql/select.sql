

SELECT trailer.titulo, trailer.descricao, trailer.link, COUNT(rank.idTrailer) 
FROM rank INNER JOIN trailer ON trailer.cod=rank.idTrailer 
GROUP BY trailer.cod 
ORDER by trailer.cod;