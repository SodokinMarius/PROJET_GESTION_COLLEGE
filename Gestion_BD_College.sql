CREATE DATABASE gestion_bd_college;

CREATE TABLE IF NOT EXISTS ELEVE(matricule varchar(10) NOT NULL PRIMARY KEY,
                            nomEtu varchar(20) NOT NULL,
                            prenomEtu varchar(30) NOT NULL,
                            dateNaissance date NOT NULL,
                            LieuNaissance varchar(20) NOT NULL,
                            sexe ENUM('M','F') NOT NULL,
                            age int ,
                            telephone varchar(12),
                            Admail varchar(25),
                            idAdressEl varchar(10),
                            codclass varchar(10),
                            idEnseign varchar(10),
                            FOREIGN KEY(codclass) REFERENCES CLASSE(codclass),
                            FOREIGN KEY(idEnseign) REFERENCES ENSEIGNANT(idEnseign),
                            FOREIGN KEY(idAdressEl) REFERENCES ADRESSE_EL(idAdressEl));
CREATE TABLE IF NOT EXISTS ENSEIGNANT(idEnsein varchar(10) NOT NULL PRIMARY KEY,
                            nomEnseign varchar(20) NOT NULL,
                            prenomEnseign varchar(30) NOT NULL,
                            dateNaissanceEns date NOT NULL,
                            LieuNaissanceEns varchar(20) NOT NULL,
                            statut varchar(20) NOT NULL,
                            sexeEns ENUM('M','F') NOT NULL,
                            ageEns int ,
                            telephone varchar(12),
                            Admail varchar(25),
                            numcenseur varchar(10),
                            idAdressEns varchar(10),
                            FOREIGN KEY(idAdressEns) REFERENCES ADRESSE_ENS(idAdressEns),
                           FOREIGN KEY(numcenseur) REFERENCES CENSEUR(numcenseur) );
CREATE TABLE IF NOT EXISTS ADRESSE_EL(idAdressEl varchar(10) NOT NULL PRIMARY KEY,
                             pays varchar(20),departement varchar(20),
                             commune varchar(20), 
                             arrondissement varchar(20),
                             quartier varchar(25),
                             rue varchar(30));
CREATE TABLE IF NOT EXISTS ADRESSE_ENS(idAdressEns varchar(10) NOT NULL PRIMARY KEY,
                             pays varchar(20),departement varchar(20),
                             commune varchar(20), 
                             arrondissement varchar(20),
                             quartier varchar(25),
                             rue varchar(30));
CREATE TABLE IF NOT EXISTS CLASSE(codclass varchar(10) NOT NULL PRIMARY KEY,
                            libclass varchar(25) NOT NULL,
                            codspecialite varchar(10), 
                            idAdressEns varchar(10),
                            FOREIGN KEY(codspecialite) REFERENCES SPECIALITE(codspecialite),
                            FOREIGN KEY (idAdressEns) REFERENCES ENSEIGNANT(idAdressEns));
CREATE TABLE if NOT EXISTS ANNEE( idAnnee varchar(10) NOT NULL PRIMARY KEY?
                            libAnnee int );
CREATE TABLE IF NOT EXISTS SEMESTRE( idsem varchar(10) NOT NULL PRIMARY KEY,
                            libsem varchar(4),
                           idAnnee varchar(10),
                           FOREIGN KEY(idAnnee) REFERENCES ANNEE(idAnnee));
CREATE TABLE IF NOT EXISTS INSCRIPTION(matricule varchar(10),idAnnee varchar(10),
                            montantIns decimal(6,2),
                            dateins date, 
                            PRIMARY KEY(matricule,idAnnee));
CREATE TABLE IF NOT EXISTS SPECIALITE(codspecialite varchar(10),
                            libspecialite varchar(50));
CREATE TABLE IF NOT EXISTS NOTE_OBTENIR(matricule varchar(10),idmat varchar(10),idsem varchar(10),
                        note decimal(2,2),
                        type_note varchar(10),
                        idconduite varchar(10),
                        PRIMARY  KEY(matricule,idmat,idsem),
                        FOREIGN KEY(idconduite) REFERENCES CONDUITE(idconduite));
CREATE TABLE IF NOT EXISTS DISPENSER(idmat varchar(10),idEnsein varchar(10), 
                        codclass varchar(10) ,coefmat int,
                            PRIMARY KEY(idmat,codclass));
CREATE TABLE IF NOT EXISTS EXAMEN(idexam varchar(10),libexam varchar(30),datexam date);

CREATE TABLE IF NOT EXISTS DISCIPLINE(iddiscipl varchar(10), action varchar(10), dateact date,
                matricule varchar(10),sanction varchar(10), FOREIGN KEY (matricule) REFERENCES ELEVE(matricule));
CREATE TABLE IF NOT EXISTS CONDUITE(idconsuite varchar(10), note int, decision_conseil text,idsem int,
                            matricule varchar(10), FOREIGN KEY (matricule) REFERENCES ELEVE(matricule),
                            FOREIGN KEY idsem (idsem) REFERENCES semestre(idsem));
CREATE TABLE IF NOT EXISTS EXAMEN(codExam varchar(10),libexam varchar(10),typeexam varchar(10),
                            idmat varchar(10),dateexam date, note DECIMAL(2,2),
                            PRIMARY KEY(codExam,idmat,dateexam));
CREATE TABLE IF NOT EXISTS NOTE_SERVICE(idnote varchar(10) NOT NULL PRIMARY KEY,
                            date_sortie date, objectif text);
CREATE TABLE IF NOT EXISTS CONSEIL(idconseil varchar(10) NOT NULL PRIMARY KEY,
                            dateconseil date, lieu varchar(10), heure TIME, objectif text);
CREATE TABLE IF NOT EXISTS DEPENSE(iddepp varchar(10) NOT NULL PRIMARY KEY,
                            butdepp text, datedepp date, MontanDep DECIMAL(10,2));
CREATE TABLE IF NOT EXISTS CREDIT(idcredit varchar(10),objectif text, datecred date, sourcecred VARCHAR(10));

                /*REQUETES*/
SELECT ELEVE.matricule,nomEtu,prenomEtu,sexe,age,libclass,note,type_note,
libmat,coef,AVG() AS Meoyyenne
FROM ELEVE INNER JOIN CLASSE ON ELEVE.codclass=CLASSE.codclass
 INNER JOIN NOTE_OBTENIR NOTE_OBTENIR ON ELEVE.matricule=NOTE_OBTENIR.matricule
 INNER JOIN MATIERE ON NOTE_OBTENIR.idmat=MATIERE.idmat INNER JOIN DISPENSER ON 
  MATIERE.codmat=DISPENSER.codmat INNER JOIN SEMESTRE
 ON NOTE_OBTENIR.idsem=SEMESTRE.idsem 

WHERE matricule=$_POST['matricule'];