CREATE DATABASE pokedb;
USE pokedb;

CREATE TABLE pokemon_t
(
    pokemon_id int(5) not null auto_increment,
    pokemon_name varchar(100) not null,
    pokemon_species_id int(5) not null,
    pokemon_height int(5) not null,
    pokemon_weight int(5) not null,
    pokemon_base_exp int(5) not null,
    PRIMARY KEY (pokemon_id)
);

CREATE TABLE type_t
(
    type_id int(5) not null auto_increment,
    type_name varchar(100) not null,
    type_generation int(5) not null,
    type_damage_class_id int(5),
    type_hexcolor varchar(7),
    PRIMARY KEY (type_id)
);

CREATE TABLE pokemon_type_t
(
    pokemon_id int not null,
    type_id int not null,
    FOREIGN KEY (pokemon_id) REFERENCES pokemon_t (pokemon_id),
    FOREIGN KEY (type_id) REFERENCES type_t (type_id)
);

CREATE TABLE users 
(
    id int(5) not null auto_increment,
    username varchar(10) not null,
    email varchar(30) not null,
    password varchar(100) not null,
    PRIMARY KEY (id)
);

CREATE TABLE user_pokemons
(
  userPokeId int(11) not null auto_increment,
  nickname varchar(30) not null,
  userId int(5) not null,
  pokeNo int(5) not null,
  pokeName varchar(30) not null,
  PRIMARY KEY (userPokeId),
  FOREIGN KEY (userId) REFERENCES users (id),
  FOREIGN KEY (pokeNo) REFERENCES pokemon_t (pokemon_id)
);