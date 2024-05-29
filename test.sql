USE `sportify`;
DELETE FROM `Client`;
DELETE FROM `Sport`;
DELETE FROM `SportClient`;
DELETE FROM `Chat`;
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

INSERT INTO `SportClient` (`sport_id`, `client_id`)
VALUES 
    (41, 113),
    (42, 113),
    (43, 113),
    (44, 116),
    (45, 116),
    (46, 116),
    (47, 120),
    (48, 120),
    (49, 120),
    (50, 120);

INSERT INTO `Chat` (`emetteur_id`, `recepteur_id`, `date`, `heure`, `message`)
VALUES 
    (103, 104, '2021-01-01', '12:00:00', 'Hello, Jane!'),
    (104, 103, '2021-01-01', '12:01:00', 'Hi, John!'),
    (103, 104, '2021-01-01', '12:02:00', 'How are you?'),
    (104, 103, '2021-01-01', '12:03:00', 'I am good, thanks!'),
    (103, 104, '2021-01-01', '12:04:00', 'What are you up to?'),
    (104, 103, '2021-01-01', '12:05:00', 'Just working on some projects.'),
    (103, 104, '2021-01-01', '12:06:00', 'Sounds interesting!'),
    (104, 103, '2021-01-01', '12:07:00', 'Yes, it is!'),
    (103, 104, '2021-01-01', '12:08:00', 'Well, I have to go now. Talk to you later!'),
    (104, 103, '2021-01-01', '12:09:00', 'Sure, talk to you later!');
