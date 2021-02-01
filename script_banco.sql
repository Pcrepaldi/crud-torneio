-- Nesse projeto foi usado o SQL Server Versao 8.0.22
-- Mudar USER E PASSWORD no codigo PHP se necessário

CREATE DATABASE crud_times;

USE crud_times;

CREATE TABLE IF NOT EXISTS time (
	id int key auto_increment, 
	nome varchar(100) NOT NULL);

CREATE TABLE IF NOT EXISTS times_partida (
	id int key auto_increment, 
	id_time1 int NOT NULL, 
	id_time2 int NOT NULL);

CREATE TABLE IF NOT EXISTS partida (
	id int key auto_increment, 
	id_times_partida int NOT NULL, 
	data date NOT NULL, 
	horario time NOT NULL, 
	FOREIGN KEY (id_times_partida) REFERENCES times_partida(id));
				   
INSERT INTO time (id, nome) values (null, 'Flamengo');
INSERT INTO time (id, nome) values (null, 'Palmeiras');
INSERT INTO time (id, nome) values (null, 'Cruzeiro');
INSERT INTO time (id, nome) values (null, 'Sao Paulo');
INSERT INTO time (id, nome) values (null, 'Santos');
INSERT INTO time (id, nome) values (null, 'Vasco');