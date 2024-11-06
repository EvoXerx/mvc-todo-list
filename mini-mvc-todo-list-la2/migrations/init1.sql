CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `texte` varchar(200) NOT NULL,
  `termine` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `todos` ADD PRIMARY KEY (`id`);
ALTER TABLE `todos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
