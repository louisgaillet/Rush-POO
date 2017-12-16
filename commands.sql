DROP TABLE products;
DROP TABLE categories;
DROP TABLE users;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL UNIQUE,
  `admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (username, password, email, admin) VALUES ('admin', '$2y$10$SEcLFVWKtdNRmTFVCCSlC.u0yQ0foUpI1ljNQNW5mnXd37sU8Y6V6', 'admin@test.com', 1);

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL UNIQUE,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO categories
VALUES 
(1, 'Rock', NULL), 
(2, 'Jazz', NULL), 
(3, 'Pop', NULL), 
(4, 'Rap', NULL), 
(5, 'Electro', NULL), 
(6, 'Rock alternatif', 1), 
(7, 'Garage rock', 1), 
(8, 'Punk', 1), 
(9, 'Hard Rock', 1),
(10, 'Jazz manouche', 2),
(11, 'Smooth jazz', 2),
(12, 'Indie pop', 3),
(13, 'Brit pop', 3),
(14, 'Synth pop', 3),
(15, 'Hip-hop', 4),
(16, 'Rap francais', 4),
(17, 'Chanson francaise', NULL);

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL,
  `descriptif`text NOT NULL,
  PRIMARY KEY (`id`)
  /*CONSTRAINT fk_category_id FOREIGN KEY (category_id) REFERENCES categories(id)*/
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Bob Dylan - Highway 61 Revisited',
	25,
	1,
	'/rush_php/assets/img/Bob_Dylan_-_Highway_61_Revisited.jpg',
	'"Highway 61 Revisited" is the sixth studio album by the American singer-songwriter Bob Dylan. It was released on August 30, 1965, by Columbia Records. Having until then recorded mostly acoustic music, Dylan used rock musicians as his backing band on every track of the album, except for the closing 11-minute ballad, "Desolation Row". Critics have focused on the innovative way in which Dylan combined driving, blues-based music with the subtlety of poetry to create songs that captured the political and cultural chaos of contemporary America. Author Michael Gray has argued that in an important sense the 1960s "started" with this album.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Clash - The Clash',
	18,
	1,
	'/rush_php/assets/img/The_Clash_-_The_Clash.jpg',
	'"The Clash" is the debut studio album by English punk rock band the Clash. It was released on 8 April 1977, through CBS Records. It is widely celebrated as one of the greatest punk albums of all time.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Velvet Underground - The Velvet Underground & Nico',
	20,
	1,
	'/rush_php/assets/img/The_Velvet_Underground_-_Velvet_Underground_and_Nico.jpg',
	'"The Velvet Underground & Nico" is the debut album by American rock band the Velvet Underground, released in March 1967 by Verve Records. Accompanied by vocalist Nico, the album was recorded in 1966 while the group were featured on Andy Warhol\'s Exploding Plastic Inevitable multimedia event tour, which gained attention for its experimental performance sensibilities and controversial lyrical topics, including drug abuse, prostitution, sadomasochism and sexual deviancy.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'David Bowie - Aladdin Sane',
	21,
	3,
	'/rush_php/assets/img/David_Bowie_-_Aladdin_Sane.jpg',
	'"Aladdin Sane" is the sixth studio album by English musician David Bowie, released by RCA Records on 13 April 1973. The follow-up to his breakthrough The Rise and Fall of Ziggy Stardust and the Spiders from Mars, it was the first album he wrote and released from a position of stardom.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Smiths - The Queen Is Dead',
	16,
	3,
	'/rush_php/assets/img/The_Smiths_-_The_Queen_Is_Dead.png',
	'"The Queen Is Dead" is the third studio album by English rock band the Smiths. It was released on 16 June 1986 in the United Kingdom by Rough Trade Records and released in the United States on 23 June 1986 through Sire Records.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Roy Eldridge - Roy\'s Got Rhythm',
	19,
	2,
	'/rush_php/assets/img/Roy_Eldridge_-_Roys_Got_Rythm.jpg',
	'"Roy\'s Got Rhythm" is an album by American jazz trumpeter Roy Eldridge featuring tracks recorded in Sweden in 1951 and released on the EmArcy label. The album was originally recorded for the Swedish label Metronome, and some cuts were also released on Prestige Records.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Black Lips - Arabia Mountain',
	13,
	7,
	'/rush_php/assets/img/The_Black_Lips_-_Arabia_Mountain.jpg',
	'"Arabia Mountain" is the sixth studio album by American garage punk band Black Lips, released on June 7, 2011. The album was written and recorded over a nine-month stretch from March 2010 to January 2011. Lockett Pundt produced "Bicentennial Man" and "Go Out and Get It", while Mark Ronson was responsible for producing the rest.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Ramones - Rocket To Russia',
	16,
	1,
	'/rush_php/assets/img/The_Ramones_-_Rocket_To_Russia.jpg',
	'"Rocket to Russia" is the third studio album by the American punk rock band the Ramones, and was released on November 4, 1977, through Sire Records. Its origins date back to the summer of 1977, when "Sheena Is a Punk Rocker" was released as a single. That summer was known as the peak of the punk rock genre since many punk bands were offered recording contracts.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Beatles - The Red Album',
	30,
	3,
	'/rush_php/assets/img/beatles-1962-1966-red-album.jpg',
	'"1962–1966 (also known as "The Red Album") is a compilation album by the English rock band the Beatles, spanning the years indicated in the title. Released with its counterpart 1967–1970 ("The Blue Album") in 1973, it reached No. 3 in the United Kingdom and No. 1 in the United States Cash Box album chart.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Belle & Sebastian - If You\'re Feeling Sinister',
	19,
	3,
	'/rush_php/assets/img/belle_and_sebastien.jpg',
	'"If You\'re Feeling Sinister" is the second album by Scottish indie pop band Belle and Sebastian. It was released in 1998 on Jeepster Records in the United Kingdom and Matador Records in the United States. It received positive reviews.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Cure - Greatest Hits',
	18,
	1,
	'/rush_php/assets/img/cure.jpg',
	'"Greatest Hits" is a 2001 compilation album by The Cure. The band\'s relationship with longtime label Fiction Records came to a close, and The Cure were obliged to release one final album for the label. Robert Smith agreed to release a greatest hits album under the condition that he could choose the tracks himself. The band also recorded a special studio album released as a bonus disc to some versions of the album.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Clash - London Calling',
	26,
	1,
	'/rush_php/assets/img/london_calling.jpg',
	'"London Calling" is the third studio album by English punk rock band the Clash. It was released as a double album in the United Kingdom on 14 December 1979 by CBS Records, and in the United States in January 1980 by Epic Records.[1] London Calling is an album that incorporates a range of styles, including punk, reggae, rockabilly, ska, New Orleans R&B, pop, lounge jazz, and hard rock.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Strokes - Is This It',
	22,
	1,
	'/rush_php/assets/img/The_Strokes_-_Is_This_It.jpg',
	'"Is This It" is the debut studio album by American rock band the Strokes. Recorded at Transporterraum in New York City with producer Gordon Raphael, the album was first released on July 30, 2001, in Australia, with RCA Records as the primary label. The record entered the UK Albums Chart at number two and peaked at number 33 on the US Billboard 200, going on to achieve platinum status in several markets. "Hard to Explain", "Last Nite", and "Someday" were released as singles.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Edith Piaf - The Best Of Edith Piaf',
	17,
	17,
	'/rush_php/assets/img/piaf.jpg',
	'Best known for singing songs "La Vie En Rose", composed by Louiguy, with lyrics by Piaf, and English lyrics adapted by Mack David; and "Non, Je Ne Regrette Rien" written by Michel Vaucaire, which rather fittingly she sung just two years before the end of her eventful life.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'De La Soul',
	16,
	4,
	'/rush_php/assets/img/De_La_Soul_-_3_Feet_High_And_Rising.jpg',
	'"3 Feet High and Rising" is the debut studio album by American hip hop trio De La Soul. It was released on March 14, 1989, by Tommy Boy Records. It marked the first of three full-length collaborations with producer Prince Paul, which would become the critical and commercial peak of both parties. It is consistently placed on \'greatest albums\' lists by noted music critics and publications.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Hives - Veni Vidi Vicious',
	16,
	1,
	'/rush_php/assets/img/The_Hives_-_-Veni_Vidi_Vicious.jpg',
	'"Veni Vidi Vicious" is the second album by Swedish garage punk band The Hives. The album was released on 10 April 2000 through Burning Heart Records and distributed through Warner Music Group. It was later re-released on 30 April 2002.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Doc GynÃ©co - PremiÃ¨re Consultation',
	13,
	4,
	'/rush_php/assets/img/Doc_Gyneco_-_Premiere_Consultation.jpg',
	'"PremiÃ¨re Consultation", released in April 1996, is Doc GynÃ©co\'s first album which received large media praise and huge success both in France and the world. Singles from the album include "Est-ce que Ã§a le fait?", "Viens voir le docteur", "Dans Ma Rue", "Passements de Jambes", and "NÃ© Ici".'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Arcade Fire - The Suburbs',
	18,
	1,
	'/rush_php/assets/img/Arcade_Fire_-_The_Suburbs.jpg',
	'"The Suburbs" is the third studio album by the Canadian indie rock band Arcade Fire, released in August 2010.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The White Stripes - De Stijl',
	16,
	1,
	'/rush_php/assets/img/The_White_Stripes_-_De_Stijl.jpg',
	'"De Stijl" is the second studio album by the American garage rock band The White Stripes, released on June 20, 2000 on Sympathy for the Record Industry. The album reached number thirty-eight on Billboard\'s Independent Albums chart in 2002, when The White Stripes\' popularity began to grow. It has since become a cult favorite among White Stripes fans, due to the simplicity of the band\'s blues/punk fusion.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Blur - Parklife',
	15,
	1,
	'/rush_php/assets/img/Blur_-_Parklife.jpg',
	'"Parklife" is the third studio album by the English rock band Blur, released in April 1994 on Food Records. After disappointing sales for their previous album Modern Life Is Rubbish (1993), Parklife returned Blur to prominence in the UK, helped by its four hit singles: "Girls & Boys", "End of a Century", "Parklife" and "To the End".'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'George Benson - Good King Bad',
	16,
	2,
	'/rush_php/assets/img/George_Benson_-_Good_King_Bad.jpg',
	'"Good King Bad" is a studio album by American guitarist George Benson featuring performances recorded in 1975 and released by CTI Records.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'The Kinks - Kinda Kinks',
	18,
	1,
	'/rush_php/assets/img/The_Kinks_-_Kinda_Kinks.jpg',
	'"Kinda Kinks" is the second studio album by English rock band The Kinks, released in 1965. Recorded and released within two weeks after returning from a tour in Asia, Ray Davies and the band were not satisfied with the production. The single "Tired of Waiting for You" was a #1 hit on the UK Singles Charts.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'Fatboy Slim - Better Living Through Chemistry',
	16,
	5,
	'/rush_php/assets/img/Fatboy_Slim_-_Better_Living_Through_Chemistry.jpg',
	'"Better Living Through Chemistry" is the debut studio album by the English big beat producer Fatboy Slim, released on 23 September 1996 by Skint Records internationally and by Astralwerks in the United States and Canada. The founder of Skint Records, Damian Harris, has described the album as having been "more of a compilation than an album", as some of the tracks had been recorded some time before its release, due to Norman Cook\'s other musical projects.'
	);

INSERT INTO products (name, price, category_id, img, descriptif)
VALUES (
	'LCD Soundsystem - Sound Of Silver',
	15,
	1,
	'/rush_php/assets/img/LCD_Soundsystem_-_Sound_Of_Silver.jpg',
	'"Sound of Silver" is the second studio album by American rock band LCD Soundsystem. The album was released in the United Kingdom on March 12, 2007 under Capitol Records and in the United States on March 20, 2007 under DFA Records. Sound of Silver was produced by the DFA and recorded during 2006 at Long View Farm in North Brookfield, Massachusetts and DFA Studios in New York, New York.'
	);
