<?php
/**
    * Database management class.
    *
    * @author Emile Z.
    */
class Database{

    /**
        * Check database server connection
        *
        * @return boolean whether a connection to the database server is possible
        *
        */
    public function CheckConnection(){

        try{

            $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, USER, PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return 0;

        }catch(PDOException $e){

            return 1;

        }

    }

    /**
        * Database reset method
        *
        * @param Object database connection
        *
        */
    public function DatabaseReset($db){

        $q = $db->prepare("DROP TABLE apps");
        $q->execute();

        $q = $db->prepare("DROP TABLE connexions");
        $q->execute();

        $q = $db->prepare("DROP TABLE favoris");
        $q->execute();

        $q = $db->prepare("DROP TABLE idea");
        $q->execute();

        $q = $db->prepare("DROP TABLE idea_vote");
        $q->execute();

        $q = $db->prepare("DROP TABLE new");
        $q->execute();

        $q = $db->prepare("DROP TABLE procedures");
        $q->execute();

        $q = $db->prepare("DROP TABLE rgpd");
        $q->execute();

        $q = $db->prepare("DROP TABLE search");
        $q->execute();

        $q = $db->prepare("DROP TABLE tutoriel");
        $q->execute();

        $q = $db->prepare("DROP TABLE users");
        $q->execute();

    }

    /**
        * Check if tables exist
        *
        * @param Object database connection
        *
        * @return boolean if the tables exists
        *
        */
    public function CheckTables($db){

        $q = $db->prepare("SHOW TABLES");
   	    $q->execute();
   	    $tables = $q->rowCount();

        if($tables != 0)
        {
            return 0;
        }else{
            return 1;
        }

    }

    /**
        * Creation of the tables method
        *
        * @param Object database connection
        *
        */
    public function addTables($db){

        $q = $db->prepare("
            CREATE TABLE `apps` (
            `id_apps` int(11) NOT NULL,
            `nom_apps` varchar(255) NOT NULL,
            `lien_apps` varchar(255) NOT NULL,
            `img` varchar(255) NOT NULL,
            `description` text NOT NULL,
            `nom_categorie` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

            CREATE TABLE `connexions` (
            `id` int(11) NOT NULL,
            `matricule` varchar(255) NOT NULL,
            `address_ip` varchar(255) NOT NULL,
            `date_connexions` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `rgpd` (
            `id` int(11) NOT NULL,
            `ip` varchar(255) NOT NULL,
            `machine` varchar(255) NOT NULL,
            `agent` varchar(255) NOT NULL,
            `date` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

            CREATE TABLE `favoris` (
            `id` int(11) NOT NULL,
            `matricule` varchar(255) NOT NULL,
            `application` varchar(255) NOT NULL,
            `link` varchar(255) NOT NULL,
            `img` varchar(255) NOT NULL,
            `actif` varchar(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `idea` (
            `id` int(11) NOT NULL,
            `titre` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `matricule` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `contenue` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `statue` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `motif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `id_idea` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `adress_ip` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `date_idea` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `idea_vote` (
            `id` int(11) NOT NULL,
            `matricule` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `idea_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
            `vote` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `new` (
            `id` int(11) NOT NULL,
            `sujet` varchar(255) NOT NULL,
            `elements` mediumtext NOT NULL,
            `id_new` varchar(255) NOT NULL,
            `date_new` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `search` (
            `id` int(11) NOT NULL,
            `type` varchar(255) NOT NULL,
            `categorie` varchar(255) NOT NULL,
            `sous_categorie` varchar(255) NOT NULL,
            `sujet` varchar(255) NOT NULL,
            `elements` varchar(255) NOT NULL,
            `link` varchar(255) NOT NULL,
            `id_search` varchar(255) NOT NULL,
            `date_search` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `tutoriel` (
            `id` int(11) NOT NULL,
            `sujet` varchar(255) NOT NULL,
            `categorie` varchar(255) NOT NULL,
            `elements` longtext NOT NULL,
            `id_tuto` varchar(255) NOT NULL,
            `date_tuto` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `procedures` (
            `id` int(11) NOT NULL,
            `sujet` varchar(255) NOT NULL,
            `categorie` varchar(255) NOT NULL,
            `elements` longtext NOT NULL,
            `id_procedure` varchar(255) NOT NULL,
            `date_procedure` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

            CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `email` varchar(255) NOT NULL,
            `identifiant` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `groupe` varchar(255) NOT NULL,
            `prenom` varchar(255) NOT NULL,
            `nom` varchar(255) NOT NULL,
            `date` timestamp NOT NULL DEFAULT current_timestamp(),
            `statue` varchar(255) NOT NULL,
            `cle` varchar(255) NOT NULL,
            `date_search` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

            INSERT INTO `apps` (`id_apps`, `nom_apps`, `lien_apps`, `img`, `description`, `nom_categorie`) VALUES
            (1, 'WORKPLACE', '#', 'WORKPLACE.png', '', 'Social - RH'),
            (2, 'WHALLER', '#', 'WHALLER.png', '', 'Social - RH'),
            (3, 'SLACK', '#', 'SLACK.png', '', 'Social - RH'),
            (4, 'INTERSTIS', '#', 'INTERSTIS.png', '', 'Applications communes'),
            (5, 'GLPI', '#', 'GLPI.png', '', 'Applications communes'),
            (6, 'PRTG', '#', 'PRTG.png', '', 'SI'),
            (7, 'PHPMYADMIN', '#', 'PHPMYADMIN.png', '', 'SI');

            INSERT INTO `idea` (`id`, `titre`, `matricule`, `contenue`, `statue`, `motif`, `id_idea`, `adress_ip`, `date_idea`) VALUES
            (1, 'Demande d\'installation : Nextcloud', 'utilisateur_1', 'Pour le réseau de l\'entreprise, il n\'y a aucun moyen d\'accéder aux espaces personnels depuis l\'extérieur ou de préférence via un site internet. Je suggère de mettre de mettre en place Nextcloud afin de faciliter l\'accès aux données pour les utilisateurs', 'approve', 'Bonne idée', 'id_1', '127.0.0.1', '2023-12-29 00:06:40');

            INSERT INTO `idea_vote` (`id`, `matricule`, `idea_name`, `vote`) VALUES
            (1, 'administrateur', 'Demande d\'installation : Nextcloud', 'pour');

            INSERT INTO `search` (`id`, `type`, `categorie`, `sous_categorie`, `sujet`, `elements`, `link`, `id_search`, `date_search`) VALUES
            (1, 'contact', 'contact', 'contact', 'Jean Lanteigne', 'Alternant / Assistant Gestionnaire de parc informatique', 'index.php?page=contact', 'id_1', '2023-12-29 00:13:27'),
            (2, 'contact', 'contact', 'contact', 'Fabrice Chabot', 'RDSI / Gestionnaire de parc informatique', 'index.php?page=contact', 'id_2', '2023-12-29 00:13:27'),
            (3, 'contact', 'contact', 'contact', 'Thomas Grandbois', 'Alternant / Assistant Gestionnaire de parc informatique', 'index.php?page=contact', 'id_3', '2023-12-29 00:13:27'),
            (4, 'tutoriel', 'windows', 'teams', 'Exemple de procédure - TEAMS - Conversation et appels privés', 'Ceci est un exemple de tutoriel concernant une procédure Teams de conversation et d\'appels privés', 'index.php?page=tuto&action=tutoriel&id_tuto=exemple', 'id_4', '2023-12-29 00:13:27');

            INSERT INTO `tutoriel` (`id`, `sujet`, `categorie`, `elements`, `id_tuto`, `date_tuto`) VALUES
            (1, 'Exemple de procédure - TEAMS - Conversation et appels privés.', 'Teams', '<p><b>Ceci est un exemple de tutoriel concernant une procédure Teams de conversation et d\'appels privés :</b></p><br><video class=\"video\" controls=\"\" width=\"600\"><source src=\"uploads/tutoriels/exemple.mp4\" type=\"video/mp4\" poster=\"\" controls=\"\">Votre navigateur ne supporte pas le type de vidéo</video>', 'exemple', '2023-12-28 23:39:00');

            INSERT INTO `users` (`id`, `email`, `identifiant`, `password`, `groupe`, `prenom`, `nom`, `date`, `statue`, `cle`, `date_search`) VALUES
            (1, 'administrateur@localhost', 'administrateur', '$2y$12VVVVtjDF0OQRuypUmyTC2LugPuQFlN744uvaY3lDnfAtOzQrbcyW8m', 'administrateur', 'Emile', 'Zimmer', '2021-06-01 06:44:50', 'actif', 'cle1', '2021-06-06 11:21:30');
        
            ALTER TABLE `apps`
            ADD PRIMARY KEY (`id_apps`);

            ALTER TABLE `connexions`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `rgpd`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `favoris`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `idea`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `idea_vote`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `new`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `search`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `tutoriel`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `procedures`
            ADD PRIMARY KEY (`id`);

            ALTER TABLE `users`
            ADD PRIMARY KEY (`id`),
            ADD UNIQUE KEY `email` (`email`),
            ADD UNIQUE KEY `pseudo` (`identifiant`);

            ALTER TABLE `apps`
            MODIFY `id_apps` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

            ALTER TABLE `connexions`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `rgpd`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `favoris`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `idea`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `idea_vote`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `new`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `search`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `tutoriel`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `procedures`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

            ALTER TABLE `users`
            MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

            COMMIT;
        ");

        $q->execute();

    }

}

$Database = new Database();