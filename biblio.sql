CREATE DATABASE biblio CHARACTER SET utf8mb4;

USE biblio;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE etudiant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    classe VARCHAR(50),
    adresse VARCHAR(150),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE livre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    auteur VARCHAR(100) NOT NULL,
    dateEdition DATE,
    disponible TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE emprunt (
    id INT AUTO_INCREMENT PRIMARY KEY,
    livre_id INT NOT NULL,
    emprunteur_type ENUM('user', 'etudiant') NOT NULL,
    user_id INT DEFAULT NULL,
    etudiant_id INT DEFAULT NULL,
    admin_id INT DEFAULT NULL,
    dateEmprunt DATE NOT NULL,
    dateRetour DATE DEFAULT NULL,
    CONSTRAINT fk_emprunt_livre FOREIGN KEY (livre_id) REFERENCES livre(id) ON DELETE CASCADE,
    CONSTRAINT fk_emprunt_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE
    SET
        NULL,
        CONSTRAINT fk_emprunt_etudiant FOREIGN KEY (etudiant_id) REFERENCES etudiant(id) ON DELETE
    SET
        NULL,
        CONSTRAINT fk_emprunt_admin FOREIGN KEY (admin_id) REFERENCES users(id) ON DELETE
    SET
        NULL
);

INSERT INTO
    livre (titre, auteur, dateEdition)
VALUES
    ('L’Étranger', 'Albert Camus', '1942-05-19'),
    (
        'Le Petit Prince',
        'Antoine de Saint-Exupéry',
        '1943-04-06'
    ),
    ('Les Misérables', 'Victor Hugo', '1862-01-01'),
    (
        'Madame Bovary',
        'Gustave Flaubert',
        '1857-12-01'
    ),
    ('Germinal', 'Émile Zola', '1885-03-01'),
    ('Candide', 'Voltaire', '1759-01-01'),
    ('Le Rouge et le Noir', 'Stendhal', '1830-11-13'),
    (
        'Notre-Dame de Paris',
        'Victor Hugo',
        '1831-01-14'
    ),
    ('La Peste', 'Albert Camus', '1947-06-10'),
    ('Bel-Ami', 'Guy de Maupassant', '1885-04-01'),
    (
        'Le Père Goriot',
        'Honoré de Balzac',
        '1835-01-01'
    ),
    ('L’Assommoir', 'Émile Zola', '1877-01-01'),
    (
        'Le Comte de Monte-Cristo',
        'Alexandre Dumas',
        '1844-08-28'
    ),
    (
        'Les Fleurs du mal',
        'Charles Baudelaire',
        '1857-06-25'
    ),
    ('L’Île mystérieuse', 'Jules Verne', '1874-01-01'),
    (
        'Vingt mille lieues sous les mers',
        'Jules Verne',
        '1870-06-20'
    ),
    (
        'Le Tour du monde en 80 jours',
        'Jules Verne',
        '1873-01-30'
    ),
    (
        'La Condition humaine',
        'André Malraux',
        '1933-01-01'
    ),
    (
        'Le Vieil Homme et la Mer',
        'Ernest Hemingway',
        '1952-09-01'
    ),
    ('1984', 'George Orwell', '1949-06-08'),
    (
        'La Ferme des animaux',
        'George Orwell',
        '1945-08-17'
    ),
    ('L’Alchimiste', 'Paulo Coelho', '1988-01-01'),
    (
        'Harry Potter à l’école des sorciers',
        'J.K. Rowling',
        '1997-06-26'
    ),
    (
        'Le Seigneur des Anneaux',
        'J.R.R. Tolkien',
        '1954-07-29'
    ),
    (
        'Chroniques martiennes',
        'Ray Bradbury',
        '1950-05-04'
    );

INSERT INTO
    etudiant (nom, prenom, classe, adresse)
VALUES
    (
        'Ndongo',
        'Alain',
        'L1 Informatique',
        'Bonamoussadi, Douala'
    ),
    (
        'Ndongo',
        'Clarisse',
        'L2 Gestion',
        'Mvog-Ada, Yaoundé'
    ),
    (
        'Tchoumi',
        'Patrick',
        'L3 Informatique',
        'Bepanda, Douala'
    ),
    ('Ekane', 'Mireille', 'L1 Droit', 'Yassa, Douala'),
    (
        'Fokou',
        'Junior',
        'L2 Informatique',
        'Bonapriso, Douala'
    ),
    (
        'Ndzié',
        'Sandrine',
        'L3 Gestion',
        'Essos, Yaoundé'
    ),
    (
        'Kamga',
        'Eric',
        'L1 Informatique',
        'Deido, Douala'
    ),
    (
        'Eyango',
        'Djibril',
        'L2 Informatique',
        'BP cite, Douala'
    ),
    (
        'Mbah',
        'Rodrigue',
        'L3 Informatique',
        'Akwa, Douala'
    ),
    (
        'Tankoua',
        'Stéphane',
        'L1 Gestion',
        'Bastos, Yaoundé'
    ),
    (
        'Talla',
        'Grâce',
        'L2 Informatique',
        'Makepe, Douala'
    ),
    (
        'Moukouri',
        'Didier',
        'L3 Droit',
        'Etoudi, Yaoundé'
    ),
    (
        'Ewandje',
        'Kevin',
        'L1 Informatique',
        'Nkolbisson, Yaoundé'
    ),
    ('Ndi', 'Sonia', 'L2 Gestion', 'Pk8, Douala'),
    (
        'Kamguem',
        'Francis',
        'L3 Informatique',
        'Ekounou, Yaoundé'
    );