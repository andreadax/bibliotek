CREATE SCHEMA lib;
CREATE SEQUENCE seq1;
CREATE SEQUENCE seq2;
CREATE TABLE lib.livres(
    code_livre integer NOT NULL DEFAULT nextval('seq1'),
    titre VARCHAR(50) NOT NULL,
    auteur VARCHAR(50) NOT NULL,
    editeur VARCHAR(50),
    CONSTRAINT pk_livre PRIMARY KEY (code_livre)
);
CREATE TABLE lib.membres(
    code_membre integer NOT NULL DEFAULT nextval('seq2'),
    nom VARCHAR (50) NOT NULL,
    adresse VARCHAR (50) NOT NULL,
    CONSTRAINT pk_membre PRIMARY KEY (code_membre)
);
CREATE TABLE lib.emprunts(
    code_livre integer NOT NULL,
    code_membre integer NOT NULL,
    date_emprunt date NOT NULL DEFAULT now(),
    date_retour date,
    CONSTRAINT fk_emprunt1 FOREIGN KEY (code_livre)
        REFERENCES lib.livres (code_livre)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_emprunt2 FOREIGN KEY (code_membre)
        REFERENCES lib.membres (code_membre)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);