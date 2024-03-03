CREATE TABLE artikli (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naziv VARCHAR(255),
    stanjeSkladiste DECIMAL(10,2),
    cijena DECIMAL(10,2),
    potrebnoNabaviti DECIMAL(10,2),
    cijenaUNabavi DECIMAL(10,2),
    krajnjiRokNabave DATE
);
INSERT INTO artikli (naziv, stanjeSkladiste, cijena, potrebnoNabaviti, cijenaUNabavi, krajnjiRokNabave) VALUES
('paprika', 1225.25, 0.89, 0, 0, NULL),
('krumpir crveni', 600, 0.57, 3000, 0.35, '2024-08-24'),
('krumpir žuti', 0, NULL, 1200, 0.48, '2024-06-12'),
('krumpir mladi', 260.83, 0.94, 6500, 0.50, '2024-04-15'),
('žarulja 20W', 250, 2.74, 300, 1.25, '2024-04-20');