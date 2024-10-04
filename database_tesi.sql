CREATE DATABASE tesi;
USE tesi;

CREATE TABLE corso(
	id INT AUTO_INCREMENT PRIMARY KEY,
    canale VARCHAR(50) NOT NULL,
    anno YEAR NOT NULL
);

CREATE TABLE lezione(
	id INT AUTO_INCREMENT PRIMARY KEY,
    ordine INT NOT NULL,
    data DATE NOT NULL,
    link VARCHAR(255),
    argomento TEXT NOT NULL,
    corso_id INT NOT NULL,
    INDEX idx_corso (corso_id),
    FOREIGN KEY (corso_id) REFERENCES corso(id)
);

CREATE TABLE avvisi(
	id INT AUTO_INCREMENT PRIMARY KEY,
    testo TEXT NOT NULL, 
    data_pubblicazione DATE NOT NULL,
    corso_id INT NOT NULL,
    INDEX idx_corso (corso_id),
    FOREIGN KEY (corso_id) REFERENCES corso(id)
);

CREATE TABLE professore(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    email VARCHAR(255)NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE insegnamento(
	professore_id INT NOT NULL, 
    corso_id INT NOT NULL,
    PRIMARY KEY(professore_id, corso_id),
    INDEX idx_professore (professore_id),
    INDEX idx_corso (corso_id),
    FOREIGN KEY (professore_id) REFERENCES professore(id),
    FOREIGN KEY (corso_id) REFERENCES corso(id)
);

CREATE TABLE studente(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    email VARCHAR(255)NOT NULL,
    password VARCHAR(255) NOT NULL,
    matricola VARCHAR(50) NOT NULL
);

CREATE TABLE assegnazione (
	corso_id INT NOT NULL,
    studente_id INT NOT NULL,
    PRIMARY KEY (corso_id, studente_id),
    INDEX idx_corso (corso_id),
    INDEX idx_studente (studente_id),
    FOREIGN KEY (corso_id) REFERENCES corso(id),
    FOREIGN KEY (studente_id) REFERENCES studente(id)
);

CREATE TABLE appello (
	id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    corso_id INT NOT NULL,
    INDEX idx_corso (corso_id),
    FOREIGN KEY (corso_id) REFERENCES corso(id)
);
CREATE TABLE compito_sql (
	id INT AUTO_INCREMENT PRIMARY KEY,
    schema_compito TEXT NOT NULL,
    dati TEXT NOT NULL
);

CREATE TABLE compito_progettazione (
	id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE testo_compito (
	id INT AUTO_INCREMENT PRIMARY KEY,
    sql_id INT NULL,
    progettazione_id INT NULL,
    INDEX idx_sql (sql_id),
    INDEX idx_progettazione (progettazione_id),
    FOREIGN KEY (sql_id) REFERENCES compito_sql(id),
    FOREIGN KEY (progettazione_id) REFERENCES compito_progettazione(id)
);

CREATE TABLE valutazione (
	id INT AUTO_INCREMENT PRIMARY KEY,
    esito INT NOT NULL,
    studente_id INT NOT NULL,
    appello_id INT NOT NULL,
    compito_id INT NOT NULL,
    INDEX idx_studente (studente_id),
    INDEX idx_appello (appello_id),
    INDEX idx_compito (compito_id),
    FOREIGN KEY (studente_id) REFERENCES studente(id),
    FOREIGN KEY (appello_id) REFERENCES appello(id),
    FOREIGN KEY (compito_id) REFERENCES testo_compito(id)
);

CREATE TABLE query (
	id INT AUTO_INCREMENT PRIMARY KEY,
    testo TEXT NOT NULL,
    punteggio INT NOT NULL,
    ordine INT NOT NULL,
    sql_id INT NOT NULL,
    INDEX idx_sql (sql_id),
    FOREIGN KEY (sql_id) REFERENCES compito_sql(id)
);

CREATE TABLE domanda (
	id INT AUTO_INCREMENT PRIMARY KEY,
    testo TEXT NOT NULL,
    punteggio INT NOT NULL,
    ordine INT NOT NULL,
    progettazione_id INT NOT NULL,
    INDEX idx_progettazione (progettazione_id),
    FOREIGN KEY (progettazione_id) REFERENCES compito_progettazione(id)
);

CREATE TABLE valutazione_query(
	query_id INT NOT NULL,
    valutazione_id INT NOT NULL,
    esito INT NOT NULL,
    PRIMARY KEY (query_id, valutazione_id),
    INDEX idx_query (query_id),
    INDEX idx_valutazione (valutazione_id),
    FOREIGN KEY (query_id) REFERENCES compito_sql(id),
    FOREIGN KEY (valutazione_id) REFERENCES valutazione(id)
);

CREATE TABLE valutazione_domanda(
	progettazione_id INT NOT NULL,
    valutazione_id INT NOT NULL,
    esito INT NOT NULL,
    PRIMARY KEY (progettazione_id, valutazione_id),
    INDEX idx_progettazione (progettazione_id),
    INDEX idx_valutazione (valutazione_id),
    FOREIGN KEY (progettazione_id) REFERENCES compito_progettazione(id),
    FOREIGN KEY (valutazione_id) REFERENCES valutazione(id)
);

/*Per memorizzare un professore, poiche lo inseriamo a mano nel db e necessitiamo dell'hash della password, 
andiamo su laravel e facciamo php artisan tinker Hash::make('password_da_hashare')
e memorizziamo nel db il risultato*/
