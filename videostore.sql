create table if not exists movies
(
    id    int auto_increment
        primary key,
    title varchar(150) null
);

create table if not exists dvds
(
    id       int        not null
        primary key,
    movie_id int        null,
    rented   tinyint(1) null,
    constraint movie_id
        foreign key (movie_id) references movies (id)
);

INSERT INTO cursusphp.movies (id, title) VALUES (1, 'Descendants, The');
INSERT INTO cursusphp.movies (id, title) VALUES (2, 'Girl With The Dragon Tattoo');
INSERT INTO cursusphp.movies (id, title) VALUES (3, 'Safe House');
INSERT INTO cursusphp.movies (id, title) VALUES (4, 'Lord Of The Rings: Two Towers, The');
INSERT INTO cursusphp.movies (id, title) VALUES (5, 'Darkest Hour');
INSERT INTO cursusphp.movies (id, title) VALUES (6, 'Trespass');
INSERT INTO cursusphp.movies (id, title) VALUES (7, 'Star Wars: A New Hope');

INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (5, 1, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (6, 1, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (54, 3, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (65, 2, 1);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (66, 2, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (98, 2, 1);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (120, 6, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (121, 6, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (123, 6, 0);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (141, 6, 1);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (187, 3, 1);
INSERT INTO cursusphp.dvds (id, movie_id, rented) VALUES (188, 3, 0);


