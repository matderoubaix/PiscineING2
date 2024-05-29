USE `sportify`;

-- Insertion des valeurs de test dans la table `Client`
INSERT INTO `Client` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `carte_etudiant`, `email`, `mdp`, `photo`, `typeCompte`)
VALUES 
    ('John', 'Doe', 'New York', 12345, '123-456-7890', 'ABC123', 'john.doe@example.com', 'password123', 'photo.jpg', 'client'),
    ('Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'DEF456', 'jane.smith@example.com', 'password456', 'photo.jpg', 'client'),
    -- Ajoutez plus de valeurs de test ici
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'GHI789', 'alice.johnson@example.com', 'password789', 'photo.jpg', 'client'),
    ('Bob', 'Williams', 'Houston', 98765, '444-555-6666', 'JKL012', 'bob.williams@example.com', 'password012', 'photo.jpg', 'client'),
    ('Emily', 'Brown', 'San Francisco', 13579, '777-888-9999', 'MNO345', 'emily.brown@example.com', 'password345', 'photo.jpg', 'client'),
    ('Michael', 'Jones', 'Seattle', 24680, '000-111-2222', 'PQR678', 'michael.jones@example.com', 'password678', 'photo.jpg', 'client'),
    ('Sophia', 'Davis', 'Boston', 86420, '333-444-5555', 'STU901', 'sophia.davis@example.com', 'password901', 'photo.jpg', 'client'),
    ('Daniel', 'Miller', 'Dallas', 75309, '666-777-8888', 'VWX234', 'daniel.miller@example.com', 'password234', 'photo.jpg', 'client'),
    ('Olivia', 'Wilson', 'Miami', 98765, '999-000-1111', 'YZA567', 'olivia.wilson@example.com', 'password567', 'photo.jpg', 'client'),
    ('William', 'Taylor', 'Phoenix', 12345, '222-333-4444', 'BCD890', 'william.taylor@example.com', 'password890', 'photo.jpg', 'client');

-- Insertion des valeurs de test dans d'autres tables
INSERT INTO `Client` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `email`, `mdp`, `photo`, `typeCompte`)
VALUES 
    ('John', 'Doe', 'New York', 12345, '123-456-7890', 'john.doe2@example.com', 'password123', 'photo.jpg', 'prof'),
    ('Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'jane.smith2@example.com', 'password456', 'photo.jpg', 'prof'),
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'alice.johnson2@example.com', 'password789', 'photo.jpg', 'prof'),
    ('Emily', 'Brown', 'Houston', 13579, '222-333-4444', 'emily.brown2@example.com', 'password987', 'photo.jpg', 'prof'),
    ('Michael', 'Davis', 'Phoenix', 24680, '333-444-5555', 'michael.davis2@example.com', 'password654', 'photo.jpg', 'prof'),
    ('Chris', 'Wilson', 'Philadelphia', 11223, '444-555-6666', 'chris.wilson2@example.com', 'password321', 'photo.jpg', 'prof'),
    ('David', 'Martinez', 'San Antonio', 99887, '555-666-7777', 'david.martinez2@example.com', 'password111', 'photo.jpg', 'prof'),
    ('Sarah', 'Taylor', 'San Diego', 77654, '666-777-8888', 'sarah.taylor2@example.com', 'password222', 'photo.jpg', 'prof'),
    ('Laura', 'Anderson', 'Dallas', 33445, '777-888-9999', 'laura.anderson2@example.com', 'password333', 'photo.jpg', 'prof'),
    ('James', 'Thomas', 'San Jose', 55667, '888-999-0000', 'james.thomas2@example.com', 'password444', 'photo.jpg', 'prof'),
    ('Jessica', 'Moore', 'Austin', 77889, '999-000-1111', 'jessica.moore2@example.com', 'password555', 'photo.jpg', 'prof'),
    ('Daniel', 'Jackson', 'Jacksonville', 11234, '000-111-2222', 'daniel.jackson2@example.com', 'password666', 'photo.jpg', 'prof'),
    ('Olivia', 'White', 'Fort Worth', 22345, '111-222-3334', 'olivia.white2@example.com', 'password777', 'photo.jpg', 'prof');


INSERT INTO `Sport` (`nom`, `description`)
VALUES 
    ('Yoga', 'Relaxation and stretching'),
    ('Pilates', 'Core strength and flexibility'),
    ('Zumba', 'Dance and cardio'),
    ('Boxing', 'Strength and conditioning'),
    ('Cycling', 'Cardio and endurance'),
    ('Swimming', 'Endurance and technique'),
    ('Running', 'Cardio and endurance'),
    ('Weightlifting', 'Strength and muscle building'),
    ('Martial Arts', 'Self-defense and discipline'),
    ('Dance', 'Expression and movement');

INSERT INTO `Cours` (`nom`, `description`, `date`, `heure`, `duree`, `prof_email`, `prix`, `sport_id`)
VALUES 
    ('Yoga', 'Relaxation and stretching', '2022-01-01', '09:00:00', 60, 'john.doe2@example.com', 10, 1),
    ('Pilates', 'Core strength and flexibility', '2022-01-02', '10:00:00', 60, 'jane.smith2@example.com', 15, 2);

INSERT INTO `Reservation` (`client_email`, `cours_id`)
VALUES 
    ('john.doe@example.com', 1),
    ('jane.smith@example.com', 2);

INSERT INTO `Salles` (`nom`, `adresse`, `telephone`, `email`, `cours_id`, `capacite`)
VALUES 
    ('Room A', '123 Main St', '111-222-3333', 'rooma@example.com', 1, 20),
    ('Room B', '456 Elm St', '444-555-6666', 'roomb@example.com', 2, 15);

INSERT INTO `CoordonnéeBancaire` (`type_de_paiement`, `numero_de_carte`, `date_expiration`, `code_de_securite`, `client_email`)
VALUES 
    ('Visa', '1234567890123456', '2023-01-01', 123, 'john.doe@example.com'),
    ('Mastercard', '9876543210987654', '2024-01-01', 456, 'jane.smith@example.com');

INSERT INTO `Chat` (`emetteur_email`, `recepteur_email`, `date`, `heure`, `message`)
VALUES 
    ('john.doe@example.com', 'john.doe2@example.com', '2022-01-01', '09:00:00', 'Hello, how are you?'),
    ('jane.smith@example.com', 'jane.smith2@example.com', '2022-01-02', '10:00:00', "I'm doing great, thanks!");
