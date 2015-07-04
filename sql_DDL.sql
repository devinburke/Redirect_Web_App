Create Table url_to(
url_to_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
url_to_name VARCHAR (255) NOT NULL,
url_from_id INT NOT NULL,
start_to DATETIME NOT NULL,
end_to DATETIME NOT NULL,
FOREIGN key (url_from_id) REFERENCES url_from(url_from_id)
	ON DELETE CASCADE
);

CREATE TABLE url_from(

url_from_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
url_from_name VARCHAR(255) NOT NULL,
start_from DATETIME NOT NULL,
end_from DATETIME NOT NULL
);


SELECT LAST_INSERT_ID();

SELECT url_from.url_from_name, url_to.url_to_name
FROM url_to  
INNER JOIN url_from 
ON url_to.url_from_id = url_from.url_from_id;

