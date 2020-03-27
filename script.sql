CREATE TABLE `sibw`.`listaeventos` 
( `id` INT NOT NULL , `titulo` VARCHAR(50) NOT NULL ,
 `ruta` VARCHAR(100) NOT NULL , `img` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`titulo`)) ENGINE = InnoDB;

  ALTER TABLE `listaeventos` ADD FOREIGN KEY (`id`) REFERENCES `evento`(`id`)
 ON DELETE RESTRICT ON UPDATE CASCADE;

 INSERT INTO `listaeventos` (`id`, `titulo`, `ruta`, `img`) VALUES ('1', 'COLOR FEST', 
 'plantillaEvento.php', './img/Festival1.jpg');
 INSERT INTO `listaeventos` (`id`, `titulo`, `ruta`, `img`) VALUES ('2', 'TOMORROWLAND', 'plantillaEvento.php', './img/Tomorrowland.jpg');

 INSERT INTO `evento` (`id`, `titulo`, `organizador`, `fecha`, `im1`, `im2`, `textoim1`, `textoim2`, `descripcion1`, `descripcion2`, `enlaceweb`, `enlaceorganizador`, `enlaceTwitter`, `enlaceFace`) VALUES ('2', 'Tomorrowland', 'ID&T', '2020-07-17', './img/tm1.jpg', 
 './img/tm2.jpg', 'Edición de 2019', 'Martin Garrix en el main stage', 'Tomorrowland es 
 actualmente el mayor festival de música electrónica que se 
 celebra en el mundo. En esta oportunidad se llevará a cabo del 20 al 29 de julio, como siempre en Boom, Bélgica. Tomorrowland se realiza desde hace 13 años y en la última edición asistieron 400 mil personas de casi 200 nacionalidades distintas.', 
 'Tomorrowland (Mundo del mañana en español) 
 es mucho más que una fiesta de electrónica. Por supuesto que es
  música pero también es diversión, amistad, fuegos artificiales,
   fiesta, baile, luces y gente de todos los países festejando. 
   Los escenarios y el ambiente se encuentran rodeados de una 
   decoración que simula un mundo de magia y fantasía. El festival 
   en sí, ofrece una variedad de subgéneros dentro de la música 
   electrónica. Es una especie de parque temático para adultos 
   inspirado en el mundo circense con más de 15 escenarios 
   diferentes.', 'https://www.tomorrowland.com/global/', 
   'https://www.id-t.com/', 
   'https://twitter.com/tomorrowland?lang=es', 
'https://es-es.facebook.com/tomorrowland');