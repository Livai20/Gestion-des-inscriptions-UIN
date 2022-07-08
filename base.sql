create database inscription;
use inscription

create table etudiant(
ide int primary key auto_increment, 
matricule varchar(50) not null,
nom varchar(50) not null, 
prenom varchar(50) not null,
datenaiss date not null,
lieunaiss varchar(30) not null,
genre varchar(10),
nationalite varchar(30) not null)
;

create table inscrire(
idins int primary key auto_increment,
dateinscrire timestamp default current_date,
idniv int not null,
valider varchar(5)
);

create table niveau(
idniv int primary key auto_increment,
fraisformation numeric(10) not null,
idfil int not null
);

create table filiere(
idfil int primary key auto_increment,
filiere varchar(50) not null,
cycle varchar(50) not null,
iddept int not null
);

create table departement(
iddept int primary key auto_increment,
departement varchar(50),
idfac int not null 
);

create table faculte(
idfac int primary key auto_increment,
faculte varchar(50) 
);

create table versement(
idvers int primary key auto_increment,
montant numeric(10) not null default 0,
datevers timestamp default current_date,
idniv int not null,
ide int not null
);

alter table versement add constraint checkIde
foreign key(ide) references etudiant(ide);

alter table etudiant add constraint uqEtudiant unique(matricule);