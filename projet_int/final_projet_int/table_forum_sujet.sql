CREATE TABLE forum_sujets (
	id int(6) NOT NULL auto_increment,
	auteur VARCHAR(30) NOT NULL,
	titre text NOT NULL,
	date_derniere_reponse datetime NOT NULL default '0000-00-00 00:00:00',
	PRIMARY KEY  (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;