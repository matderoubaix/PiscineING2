USE `sportify`;
DELETE FROM `Client`;
DELETE FROM `Sport`;
DELETE FROM `SportClient`;
DELETE FROM `Chat`;
DELETE FROM `Cours`;
DELETE FROM `Reservation`;
-- Insertion des valeurs de test dans la table `Client`
INSERT INTO `Client` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `carte_etudiant`, `email`, `mdp`, `photo`, `typeCompte`)
VALUES 
    ('John', 'Doe', 'New York', 12345, '123-456-7890', 'ABC123', 'john.doe@example.com', 'password123', 'photo.png', 'client'),
    ('Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'DEF456', 'jane.smith@example.com', 'password456', 'photo.png', 'client'),
    -- Ajoutez plus de valeurs de test ici
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'GHI789', 'alice.johnson@example.com', 'password789', 'photo.png', 'client'),
    ('Bob', 'Williams', 'Houston', 98765, '444-555-6666', 'JKL012', 'bob.williams@example.com', 'password012', 'photo.png', 'client'),
    ('Emily', 'Brown', 'San Francisco', 13579, '777-888-9999', 'MNO345', 'emily.brown@example.com', 'password345', 'photo.png', 'client'),
    ('Michael', 'Jones', 'Seattle', 24680, '000-111-2222', 'PQR678', 'michael.jones@example.com', 'password678', 'photo.png', 'client'),
    ('Sophia', 'Davis', 'Boston', 86420, '333-444-5555', 'STU901', 'sophia.davis@example.com', 'password901', 'photo.png', 'client'),
    ('Daniel', 'Miller', 'Dallas', 75309, '666-777-8888', 'VWX234', 'daniel.miller@example.com', 'password234', 'photo.png', 'client'),
    ('Olivia', 'Wilson', 'Miami', 98765, '999-000-1111', 'YZA567', 'olivia.wilson@example.com', 'password567', 'photo.png', 'client'),
    ('William', 'Taylor', 'Phoenix', 12345, '222-333-4444', 'BCD890', 'william.taylor@example.com', 'password890', 'photo.png', 'client');

-- Insertion des valeurs de test dans d'autres tables
INSERT INTO `Client` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `email`, `mdp`, `photo`, `typeCompte`)
VALUES 
    ('John', 'Doe', 'New York', 12345, '123-456-7890', 'john.doe2@example.com', 'password123', 'photo.png', 'prof'),
    ('Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'jane.smith2@example.com', 'password456', 'photo.png', 'prof'),
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'alice.johnson2@example.com', 'password789', 'photo.png', 'prof'),
    ('Emily', 'Brown', 'Houston', 13579, '222-333-4444', 'emily.brown2@example.com', 'password987', 'photo.png', 'prof'),
    ('Michael', 'Davis', 'Phoenix', 24680, '333-444-5555', 'michael.davis2@example.com', 'password654', 'photo.png', 'prof'),
    ('Chris', 'Wilson', 'Philadelphia', 11223, '444-555-6666', 'chris.wilson2@example.com', 'password321', 'photo.png', 'prof'),
    ('David', 'Martinez', 'San Antonio', 99887, '555-666-7777', 'david.martinez2@example.com', 'password111', 'photo.png', 'prof'),
    ('Sarah', 'Taylor', 'San Diego', 77654, '666-777-8888', 'sarah.taylor2@example.com', 'password222', 'photo.png', 'prof'),
    ('Laura', 'Anderson', 'Dallas', 33445, '777-888-9999', 'laura.anderson2@example.com', 'password333', 'photo.png', 'prof'),
    ('James', 'Thomas', 'San Jose', 55667, '888-999-0000', 'james.thomas2@example.com', 'password444', 'photo.png', 'prof'),
    ('Jessica', 'Moore', 'Austin', 77889, '999-000-1111', 'jessica.moore2@example.com', 'password555', 'photo.png', 'prof'),
    ('Daniel', 'Jackson', 'Jacksonville', 11234, '000-111-2222', 'daniel.jackson2@example.com', 'password666', 'photo.png', 'prof'),
    ('Olivia', 'White', 'Fort Worth', 22345, '111-222-3334', 'olivia.white2@example.com', 'password777', 'photo.png', 'prof');

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

INSERT INTO `Cours` (`nom`, `description`, `date`, `heure`, `prof_id`, `duree`, `prix`, `sport_id`)
VALUES 
    ('Yoga Class', 'Beginner yoga class', '2021-01-01', '10:00:00', 11, 58, 10, 1),
    ('Pilates Class', 'Intermediate pilates class', '2021-01-02', '11:00:00', 11, 58, 15, 2),
    ('Zumba Class', 'Advanced zumba class', '2021-01-03', '12:00:00', 11, 58, 20, 3),
    ('Boxing Class', 'Beginner boxing class', '2021-01-04', '13:00:00', 11, 58, 25, 4),
    ('Cycling Class', 'Intermediate cycling class', '2021-01-05', '14:00:00', 11, 58, 30, 5),
    ('Swimming Class', 'Advanced swimming class', '2021-01-06', '15:00:00', 11, 58, 35, 6),
    ('Running Class', 'Beginner running class', '2021-01-07', '16:00:00', 11, 58, 40, 7),
    ('Weightlifting Class', 'Intermediate weightlifting class', '2021-01-08', '17:00:00', 11, 58, 45, 8),
    ('Martial Arts Class', 'Advanced martial arts class', '2021-01-09', '18:00:00', 11, 58, 50, 9),
    ('Dance Class', 'Beginner dance class', '2021-01-10', '19:00:00', 11, 58, 55, 10);
    
INSERT INTO `Reservation` (`client_id`, `cours_id`)
VALUES 
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 6),
    (1, 7),
    (1, 8),
    (1, 9),
    (1, 10);
INSERT INTO `SportClient` (`sport_id`, `client_id`)
VALUES 
    (1, 11),
    (2, 11),
    (3, 11),
    (4, 11),
    (5, 11),
    (6, 11),
    (7, 11),
    (8, 11),
    (9, 11),
    (10, 11);

INSERT INTO `Chat` (`emetteur_id`, `recepteur_id`, `date`, `heure`, `message`)
VALUES 
    (1, 2, '2021-01-01', '12:00:00', 'Hello, Jane!'),
    (2, 1, '2021-01-01', '12:01:00', 'Hi, John!'),
    (1, 2, '2021-01-01', '12:02:00', 'How are you?'),
    (2, 1, '2021-01-01', '12:03:00', 'I am good, thanks!'),
    (1, 2, '2021-01-01', '12:04:00', 'What are you up to?'),
    (2, 1, '2021-01-01', '12:05:00', 'Just working on some projects.'),
    (1, 2, '2021-01-01', '12:06:00', 'Sounds interesting!'),
    (2, 1, '2021-01-01', '12:07:00', 'Yes, it is!'),
    (1, 2, '2021-01-01', '12:08:00', 'Well, I have to go now. Talk to you later!'),
    (2, 1, '2021-01-01', '12:09:00', 'Sure, talk to you later!');
