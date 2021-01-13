-- Nesse projeto foi usado o SQL Server Versao 8.0.22
-- Mudar USER E PASSWORD no codigo PHP se necessario

CREATE DATABASE crud_torneio;

USE crud_torneio;

CREATE TABLE IF NOT EXISTS time (id int key auto_increment, nome varchar(100) NOT NULL);

CREATE TABLE IF NOT EXISTS partida (id int key auto_increment, id_time1 int NOT NULL, id_time2 int NOT NULL,
				   data date NOT NULL, horario time NOT NULL, FOREIGN KEY (id_time1) REFERENCES time(id),
				   FOREIGN KEY (id_time2) REFERENCES time(id));
				   
INSERT INTO time (id, nome) values (null, 'Flamengo');
INSERT INTO time (id, nome) values (null, 'Palmeiras');
INSERT INTO time (id, nome) values (null, 'Cruzeiro');
INSERT INTO time (id, nome) values (null, 'Sao Paulo');
INSERT INTO time (id, nome) values (null, 'Santos');
INSERT INTO time (id, nome) values (null, 'Vasco');
INSERT INTO time (id, nome) values (null, 'Botafogo');
INSERT INTO time (id, nome) values (null, 'Bahia');
INSERT INTO time (id, nome) values (null, 'America-MG');
INSERT INTO time (id, nome) values (null, 'Fluminense');
INSERT INTO time (id, nome) values (null, 'Internacional');
INSERT INTO time (id, nome) values (null, 'Atletico Mineiro');


INSERT INTO partida (id, id_time1, id_time2, data, horario) values (null, 1, 2, '2021-03-19', '20:00');
INSERT INTO partida (id, id_time1, id_time2, data, horario) values (null, 3, 4, '2021-02-27', '18:00');
INSERT INTO partida (id, id_time1, id_time2, data, horario) values (null, 5, 6, '2021-02-27', '20:00');
INSERT INTO partida (id, id_time1, id_time2, data, horario) values (null, 7, 8, '2021-04-05', '22:00');
INSERT INTO partida (id, id_time1, id_time2, data, horario) values (null, 9, 10, '2021-05-20', '20:00');
INSERT INTO partida (id, id_time1, id_time2, data, horario) values (null, 11, 12, '2021-03-04', '20:00');