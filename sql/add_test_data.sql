-- Lisää INSERT INTO lauseet tähän tiedostoon  
-- Opettaja-taulun testidata
INSERT INTO Opettaja (nimi, salasana) VALUES ('Ope1', 'Ope1salas'); -- Koska id-sarakkeen tietotyyppi on SERIAL, se asetetaan automaattisesti
INSERT INTO Opettaja (nimi, salasana) VALUES ('Ope2', 'Ope2salas');
INSERT INTO Opettaja (nimi, salasana) VALUES ('Ope3', 'Ope3salas');
-- Sovellus-taulun testidata
INSERT INTO Sovellus (nimi, url, lyhytkuvaus, lisatty, kuvaus) VALUES ('Kahoot', 'getkahoot.com', 'Pelillinen kyselytyökalu', NOW(), 'kuvaus');

INSERT INTO Ryhma (nimi, selitys) VALUES ('Mobiilisovellus', 'Sopii käytettäväksi kännykällä.');