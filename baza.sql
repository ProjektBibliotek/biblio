create database biblio character set utf8 collate utf8_unicode_ci;
use biblio;

CREATE TABLE czytelnicy (
id_czytelnika INT NOT NULL auto_increment,
imie VARCHAR(30),
nazwisko VARCHAR(30),
adres VARCHAR(50),
login VARCHAR(30)NOT NULL,
haslo VARCHAR(60)NOT NULL,
PRIMARY KEY(id_czytelnika)
) ENGINE = InnoDB; 

CREATE TABLE pracownicy (
id_pracownika INT NOT NULL auto_increment,
imie VARCHAR(30),
nazwisko VARCHAR(30),
login VARCHAR(30) NOT NULL,
haslo VARCHAR(60) NOT NULL,
stanowisko VARCHAR(30),
PRIMARY KEY(id_pracownika)
) ENGINE = InnoDB; 

CREATE TABLE gatunek (
id_gatunku INT NOT NULL auto_increment,
nazwa VARCHAR(30),
PRIMARY KEY(id_gatunku)
) ENGINE = InnoDB; 

CREATE TABLE ksiazki (
id_ksiazki INT NOT NULL auto_increment,
tytul VARCHAR(50) NOT NULL,
imie VARCHAR(30),
nazwisko VARCHAR(30),
wydawnictwo VARCHAR(50),
rok INT(10),
gatunek INT(10),
PRIMARY KEY(id_ksiazki),
FOREIGN KEY(gatunek) REFERENCES gatunek(id_gatunku)
) ENGINE = InnoDB; 


CREATE TABLE wypozyczenia (
id_wypozyczenia INT NOT NULL auto_increment,
id_czytelnika INT(30) NOT NULL,
id_ksiazki INT(30) NOT NULL,
data_wypozyczenia DATE NOT NULL,
data_zwrotu DATE NOT NULL,
stan_wypozyczenia enum('0','1') NOT NULL DEFAULT '0',
PRIMARY KEY(id_wypozyczenia),
CONSTRAINT fk_w1 FOREIGN KEY(id_czytelnika) REFERENCES czytelnicy(id_czytelnika)
ON UPDATE CASCADE ON DELETE CASCADE,
CONSTRAINT fk_w2 FOREIGN KEY(id_ksiazki) REFERENCES ksiazki(id_ksiazki)
ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = InnoDB; 




CREATE OR REPLACE VIEW ksiazka_gatunek(id_ksiazki, tytul, imie, nazwisko, wydawnictwo, rok, gatunek, id_gatunku) AS SELECT id_ksiazki, tytul, imie, nazwisko, wydawnictwo, rok, gatunek.nazwa, gatunek.id_gatunku FROM ksiazki, gatunek WHERE ksiazki.gatunek=gatunek.id_gatunku;
CREATE OR REPLACE VIEW wypozyczone (id_wypozyczenia, tytul, login, data_wypozyczenia, data_zwrotu, stan_wypozyczenia) AS SELECT id_wypozyczenia, ksiazki.tytul, czytelnicy.login, data_wypozyczenia, data_zwrotu, stan_wypozyczenia FROM wypozyczenia, czytelnicy, ksiazki where ksiazki.id_ksiazki=wypozyczenia.id_ksiazki and czytelnicy.id_czytelnika=wypozyczenia.id_czytelnika;







