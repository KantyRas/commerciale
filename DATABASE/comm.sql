create database comm;
use database comm;

    create table departement(
        idDepartement serial primary key,
        nomDepartement varchar(255)
    );
    create table employe(
        idEmploye serial primary key,
        idDepartement int references departement(idDepartement),
        nomEmploye varchar(255),
        prenomEmploye varchar(255),
        salaire float
    );
    create table article_departement(
        idArticle serial primary key,
        idDepartement int references departement(idDepartement),
        designation varchar(255),
        quantiteStock float,
        prix float
    );
    create table demande(
        idDemande serial primary key,
        idDepartement int references departement(idDepartement),
        dateDemande date,
        nomArticle varchar(255),
        quantite float
    );

    create table article(
        idArticle serial primary key,
        idDepartement int references departement(idDepartement),
        designation varchar(255),
        quantite float,
        prixUnitaire float
    );
-- insert into article(idDepartement,designation,quantite,prixUnitaire) values ();
