create database comm;
use database comm;

    create table departement(
        idDepartement int not null primary key auto_increment,
        nomDepartement varchar(255)
    );
-- Inserting test data into the departement table
INSERT INTO departement (nomDepartement) VALUES
 ('Human Resources'),
 ('Information Technology'),
 ('Finance'),
 ('Marketing');

    create table employe(
        idEmploye int not null primary key auto_increment,
        idDepartement int references departement(idDepartement),
        nomEmploye varchar(255),
        prenomEmploye varchar(255),
        salaire float
    );
-- Inserting test data into the employe table
INSERT INTO employe (idDepartement, nomEmploye, prenomEmploye, salaire) VALUES
-- Employees for department with idDepartement = 1 (e.g., Human Resources)
(1, 'Smith', 'John', 50000),
(1, 'Johnson', 'Alice', 60000),
(1, 'Doe', 'Jane', 55000),
(1, 'Williams', 'Robert', 48000),

-- Employees for department with idDepartement = 2 (e.g., Information Technology)
(2, 'Miller', 'David', 70000),
(2, 'Davis', 'Emily', 62000),
(2, 'Anderson', 'Michael', 58000),
(2, 'Brown', 'Olivia', 54000),

-- Employees for department with idDepartement = 3 (e.g., Finance)
(3, 'Taylor', 'William', 75000),
(3, 'White', 'Sophia', 68000),
(3, 'Clark', 'Daniel', 60000),
(3, 'Hall', 'Ava', 52000),

-- Employees for department with idDepartement = 4 (e.g., Marketing)
(4, 'Thomas', 'Christopher', 72000),
(4, 'Moore', 'Ella', 63000),
(4, 'Harris', 'Andrew', 59000),
(4, 'Jackson', 'Grace', 51000);
create table fournisseur(
    idFournisseur int not null primary key auto_increment,
    nomFournisseur varchar(255),
    email varchar(255),
    tel varchar(255)
);
create table article(
    idArticle int not null primary key auto_increment,
    idFournisseur int references fournisseur(idFournisseur),
    designation varchar(255) not null,
    prixUnitaire float not null,
    quantite int
);

create table commande(
    idComm int not null primary key auto_increment,
    idDepartement int references departement(idDepartement),
    idFournisseur int references fournisseur(idFournisseur),
    numComm varchar(255),
    dateComm date not null,
    prixttc float not null,
    prixht float not null,
    prixtva float not null
);

create table detailCommande(
    idDetail int not null primary key auto_increment,
    idComm int not null,
    idArticle int not null,
    quantiteComm int,
    FOREIGN KEY (idComm) REFERENCES commande (idComm),
    FOREIGN KEY (idArticle) REFERENCES article (idArticle)
);

create table annonce(
    idannonce int not null primary key auto_increment,
    idComm int references commande(idComm),
    etat int default 0
);
