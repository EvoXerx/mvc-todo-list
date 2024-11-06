CREATE TABLE IF NOT EXISTS `utilisateurs` (
`id` int(11) NOT NULL,
`nom` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
`mail` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
`passw` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
`passhash` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
ALTER TABLE `utilisateurs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
INSERT INTO `utilisateurs` (`nom`, `mail`, `passw`) VALUES
('nom1', 'a@a.fr', 'p1'),
('nom2', 'b@b.fr', 'p2') ;
ALTER TABLE `todos`
ADD `utilisateur_mail` VARCHAR (30) COLLATE utf8mb4_general_ci;
COMMIT;
ALTER TABLE todos
ADD CONSTRAINT FK_utilisateurs
FOREIGN KEY (utilisateur_mail) REFERENCES utilisateurs(mail);
UPDATE todos
SET utilisateur_mail = 'a@a.fr'
WHERE id=2;
UPDATE todos
SET utilisateur_mail = 'a@a.fr'
WHERE id=10;
UPDATE todos
SET utilisateur_mail = 'b@b.fr'
WHERE id=11;
UPDATE todos
SET utilisateur_mail = 'b@b.fr'
WHERE id=12;