USE `sportify`;

-- Insert test values into `Client` table
INSERT INTO `Client` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `carte_etudiant`, `email`, `mdp`, `photo`)
VALUES 
    ('John', 'Doe', 'New York', 12345, '123-456-7890', 'ABC123', 'john.doe@example.com', 'password123', 'photo.jpg'),
    ('Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'DEF456', 'jane.smith@example.com', 'password456', 'photo.jpg'),
    -- Add more test values here
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'GHI789', 'alice.johnson@example.com', 'password789', 'photo.jpg'),
    ('Bob', 'Williams', 'Houston', 98765, '444-555-6666', 'JKL012', 'bob.williams@example.com', 'password012', 'photo.jpg'),
    ('Emily', 'Brown', 'San Francisco', 13579, '777-888-9999', 'MNO345', 'emily.brown@example.com', 'password345', 'photo.jpg'),
    ('Michael', 'Jones', 'Seattle', 24680, '000-111-2222', 'PQR678', 'michael.jones@example.com', 'password678', 'photo.jpg'),
    ('Sophia', 'Davis', 'Boston', 86420, '333-444-5555', 'STU901', 'sophia.davis@example.com', 'password901', 'photo.jpg'),
    ('Daniel', 'Miller', 'Dallas', 75309, '666-777-8888', 'VWX234', 'daniel.miller@example.com', 'password234', 'photo.jpg'),
    ('Olivia', 'Wilson', 'Miami', 98765, '999-000-1111', 'YZA567', 'olivia.wilson@example.com', 'password567', 'photo.jpg'),
    ('William', 'Taylor', 'Phoenix', 12345, '222-333-4444', 'BCD890', 'william.taylor@example.com', 'password890', 'photo.jpg');

-- Insert test values into other tables
INSERT INTO `Prof` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `email`, `mdp`, `photo`)
VALUES 
    ('John', 'Doe', 'New York', 12345, '123-456-7890', 'john.doe@example.com', 'password123', 'photo.jpg'),
    ('Jane', 'Smith', 'Los Angeles', 67890, '987-654-3210', 'jane.smith@example.com', 'password456', 'photo.jpg'),
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'alice.johnson@example.com', 'password789', 'photo.jpg'),
    ('Emily', 'Brown', 'Houston', 13579, '222-333-4444', 'emily.brown@example.com', 'password987', 'photo.jpg'),
    ('Michael', 'Davis', 'Phoenix', 24680, '333-444-5555', 'michael.davis@example.com', 'password654', 'photo.jpg'),
    ('Chris', 'Wilson', 'Philadelphia', 11223, '444-555-6666', 'chris.wilson@example.com', 'password321', 'photo.jpg'),
    ('David', 'Martinez', 'San Antonio', 99887, '555-666-7777', 'david.martinez@example.com', 'password111', 'photo.jpg'),
    ('Sarah', 'Taylor', 'San Diego', 77654, '666-777-8888', 'sarah.taylor@example.com', 'password222', 'photo.jpg'),
    ('Laura', 'Anderson', 'Dallas', 33445, '777-888-9999', 'laura.anderson@example.com', 'password333', 'photo.jpg'),
    ('James', 'Thomas', 'San Jose', 55667, '888-999-0000', 'james.thomas@example.com', 'password444', 'photo.jpg'),
    ('Jessica', 'Moore', 'Austin', 77889, '999-000-1111', 'jessica.moore@example.com', 'password555', 'photo.jpg'),
    ('Daniel', 'Jackson', 'Jacksonville', 11234, '000-111-2222', 'daniel.jackson@example.com', 'password666', 'photo.jpg'),
    ('Olivia', 'White', 'Fort Worth', 22345, '111-222-3334', 'olivia.white@example.com', 'password777', 'photo.jpg');
    
INSERT INTO `Admin` (`nom`, `prenom`, `ville`, `code_postal`, `telephone`, `email`, `mdp`)
VALUES 
    ('Alice', 'Johnson', 'Chicago', 54321, '111-222-3333', 'alice.johnson@example.com', 'password789'),
    ('Bob', 'Williams', 'Houston', 98765, '444-555-6666', 'bob.williams@example.com', 'password012');

INSERT INTO `Cours` (`nom`, `description`, `date`, `duree`, `prof_id`)
VALUES 
    ('Yoga', 'Relaxation and stretching', '2022-01-01', 60, 1),
    ('Pilates', 'Core strength and flexibility', '2022-01-02', 60, 2);

INSERT INTO `Reservation` (`client_id`, `cours_id`)
VALUES 
    (1, 1),
    (2, 2);

INSERT INTO `Salles` (`nom`, `adresse`, `telephone`, `email`, `cours_id`, `capacite`)
VALUES 
    ('Room A', '123 Main St', '111-222-3333', 'rooma@example.com', 1, 20),
    ('Room B', '456 Elm St', '444-555-6666', 'roomb@example.com', 2, 15);

INSERT INTO `CoordonnéeBancaire` (`type_de_paiement`, `numero_de_carte`, `date_expiration`, `code_de_securite`, `client_id`)
VALUES 
    ('Visa', '1234567890123456', '2023-01-01', 123, 1),
    ('Mastercard', '9876543210987654', '2024-01-01', 456, 2);

INSERT INTO `Chat` (`client_id`, `prof_id`, `id_emetteur`, `date`, `heure`, `message`)
VALUES 
    (1, 1, 1, '2022-01-01', '09:00:00', 'Hello, how are you?'),
    (2, 2, 2, '2022-01-02', '10:00:00', "I'm doing great, thanks!");
