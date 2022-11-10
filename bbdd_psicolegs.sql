/*EXECUCIO 1: UN COP NOMES. AMB AQUEST BLOC CREEM LA BASE DE DADES DE PSICOLEG I INTRODUIM DADES EN ELLA*/

CREATE TABLE psicolegs (dni varchar(9) PRIMARY KEY,
                        nom varchar(30), 
                        cognom1 varchar(30), 
                        cognom2 varchar(30),
                        tecla_disponible BOOLEAN  /*Aquest boolea sera sempre true a menys que el psicoleg digui no (NOTA: ja no es comprova boolea si rang horari de script PHP ES FORA)*/
);

/*EXECUCIO 2. POSEM  DADES DINS*/                      
INSERT INTO psicolegs(dni, nom, cognom1, cognom2, tecla_disponible) VALUES ("47980122Y", "Santi", "Sánchez", "Sans", true), ("99999999Y", "Rosana", "Palacin", "Portomeñe", false);
/*EXECUCIO 3. CONSULTA --> AMB AIXO PODEM SELECCIONAR LA BASE DE DADES (USE) I DESPRES SELECCIONEM I IMPRIMIM ELS CAMPS DE LA TAULA*/                                                           
use web_psicoleg;                                                                         
SELECT * FROM psicolegs;                                                                           