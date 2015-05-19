-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Opettaja(
  id SERIAL PRIMARY KEY, -- SERIAL tyyppinen pääavain pitää huolen, että tauluun lisätyllä rivillä on aina uniikki pääavain. Kätevää!
  nimi varchar(50) NOT NULL, -- Muista erottaa sarakkeiden määrittelyt pilkulla!
  salasana varchar(50) NOT NULL
);

CREATE TABLE Sovellus(
  id SERIAL PRIMARY KEY,
  sovellus_id INTEGER REFERENCES Opettaja(id), -- Viiteavain Opettaja-tauluun
  nimi varchar(50) NOT NULL,
  url varchar(400),
  lyhytkuvaus varchar(400),
  status varchar(50),
  lisatty DATE
  );

CREATE TABLE Ryhma(
  id SERIAL PRIMARY KEY,
  ryhma_id INTEGER REFERENCES Sovellus(id), -- Viiteavain Sovellus-tauluun
  nimi varchar(50) NOT NULL,
  selitys varchar(400)
  );