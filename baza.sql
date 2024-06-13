-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 12:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sadrzaj` text NOT NULL,
  `kategorija` varchar(70) NOT NULL,
  `datum_kreiranja` timestamp NOT NULL DEFAULT current_timestamp(),
  `arhiva` tinyint(1) DEFAULT NULL,
  `slika` varchar(70) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kratki_sadrzaj` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `naslov`, `sadrzaj`, `kategorija`, `datum_kreiranja`, `arhiva`, `slika`, `kratki_sadrzaj`) VALUES
(1, '« La culture chrétienne, la sécurité, la famille :', 'Alors qu’approchent les élections européennes, le Premier ministre hongrois Viktor Orbán se distancie de plus en plus du Parti populaire européen (PPE), dont son parti, le Fidesz, est membre au sein du Parlement européen, aux côtés de la CDU de la chancelière allemande Angela Merkel et de LR de Laurent Wauquiez. Les valeurs qu’il défend sont-elles encore compatibles avec le PPE ?\r\n\r\nPublicité\r\n\r\nKatalin Novák, secrétaire d’Etat à la Famille et vice-présidente du parti au pouvoir, répond à nos questions sur la politique familiale, fer de lance de la révolution conservatrice initiée par le gouvernement hongrois, et sur les tensions entre le Fidesz et le PPE.\r\n\r\nOn voit ces dernières semaines des affiches à tous les carrefours des villes hongroises vantant vos programmes d’aide aux familles. Quel est l’objectif de votre politique familiale ?\r\n', 'politika', '2024-06-11 22:00:00', 0, 'image1.png', 'Entretien  Les positions du gouvernement de Viktor'),
(9, '« Les Européens, ce n’est pas le problème » : en Autriche, une extrême droite banalisée', 'La fête foraine bat son plein. Une grande roue domine le Danube. Les autotamponneuses se lancent furieusement les unes contre les autres. Les haut-parleurs crachent de la musique pop américaine. Les enfants promènent leurs parents. Ce 1er mai, en plein cœur de Linz, 200 000 habitants, capitale de la Haute-Autriche, berceau historique du nazisme, les Autrichiens fêtent les travailleurs en déambulant entre les stands de tir au pigeon et les vendeurs de knödels, sorte de quenelles de pommes de terre et de mie de pain, et de käsekrainers, des saucisses fumées et farcies au fromage.\r\n\r\nUne grande tente longe l’allée principale. Dehors, les pancartes du brasseur Kaiser semblent indiquer qu’il s’agit juste de l’endroit idéal pour étancher sa soif avec une pinte de bière. A l’intérieur, c’est une tout autre histoire : plus de 5 000 de sympathisants du FPÖ (le Parti de la liberté d’Autriche) lèvent leur verre à la gloire de l’Autriche blanche et traditionnelle. Des centaines de drapeaux s’agitent alors qu’un groupe de variété réci\r\n\r\n', 'politika', '2024-06-11 22:00:00', 0, 'image2.png', 'Depuis que le FPÖ est entré au gouvernement, il di'),
(10, 'L’Europe, proie des vampires du populisme', 'Ces deux-là s’échangent de brûlants serments, se promettent « d’écrire l’Histoire ensemble » et font campagne bras dessus, bras dessous. Le 18 mai prochain, à Milan, « Marine » a rendez-vous avec « Matteo ». A l’occasion d’un meeting commun, la présidente du Rassemblement national et le « ligueur » italien, ministre verrouillé de l’Intérieur, vanteront les mérites de leur « nouvelle Europe » et se lanceront à la conquête des électeurs dans l’espoir de devenir, avec le renfort de leurs amis démagogues de tout poil, la troisième force du prochain Parlement de Bruxelles, talonnant les cacochymes conservateurs ou sociaux-démocrates.\r\n\r\nBienvenue sur le continent des cadors du populisme ! Frontières fermées, nationalisme exacerbé et démocratie encadrée… Les marchands de désillusion ont pris la main à Budapest, à Varsovie, à Vienne. Ils progressent en Espagne dans le souvenir du franquisme, en Allemagne où 92 députés xénophobes déstabilisent la grande coalition d’Angela Merkel et, bien sûr, en France dans l’arrière-boutique de la PME Le Pen & Co. La fièvre touche aussi bien les pays du sud de l’Europe, broyés par la crise économique, que les nations du Nord, prospères et en plein redémarrage économique, comme la Suède, le Danemark, les Pays-Bas ou l’Autriche.\r\n\r\nNationalisme zombie\r\nOn voit par là que la cause principale de coup de pompe démocratique est identitaire. Après la fin du rêve socialiste, dans les affres du marché unique, chaque pays ou presque voit grandir un avatar d’un nationalisme zombie tout droit sorti du XIXe siècle qui prône le repli d’une Europe censément blanche face à la menace d’un tsunami migratoire. Cette angoisse de l’« appel d’air » continental est aggravée par l’imaginaire cosmopolite de la mondialisation. Une Europe ouverte dans un monde ouvert ? « Fermons la porte, quelqu’un pourrait entrer », s’alarment nos souverainistes illibéraux.\r\n\r\n\r\nPar une pirouette rhétorique, les Salvini, Le Pen et Orbán se revendiquent désormais comme les seuls vrais Européens. Ils prétendent même relever la bannière bleue piquée d’étoiles. Et s’ils entrent au Parlement, c’est afin de refaire la maison depuis l’intérieur. « Nous détestons l’Europe. L’Europe est démocratique. Nous allons nous faire élire en son sein pour mieux la détruire ! » C’est dans ce syllogisme que réside l’ultime escroquerie de ces tartufes, qui retournent l’antiparlementarisme à leur profit.\r\n\r\nSouveraineté factice\r\nLeur Europe est une Europe à rebours de l’Histoire. Après les deux grands massacres du XXe siècle, les pères fondateurs n’avaient d’autre projet que de dépasser enfin les idéologies nationales qui justifièrent tant de charniers, jusqu’au génocide. Mais les néonationalismes d’aujourd’hui ressortent des sarcophages avec leur immense et sinistre cortège de morts-vivants.\r\n\r\nVie quotidienne à Budapest en Hongrie, pionnière de la dérive illibérale. (ALEX WEBB / MAGNUM PHOTOS)\r\nHongrie, Pologne, Autriche, Italie… Ils vivent sous le populisme.\r\n\r\nCe sont les âmes perdues des petites nations d’Europe centrale ou des anciens Empires britanniques, français, espagnol voire austro-hongrois qui reviennent nous hanter. Par la ruse d’une souveraineté factice, les vampires du populisme ne proposent rien d’autre que de nous offrir aux canines de nouveaux maîtres américains, chinois ou russes. « Nul homme ne sait, tant qu’il n’a pas souffert de la nuit, à quel point l’aube peut être chère et douce au cœur », prophétisa Bram Stoker, dans son mythique « Dracula ». C’était avant les grands cimetières sous la lune', 'politika', '2024-06-11 22:00:00', 0, 'image3.png', 'EDITO. Salvini, Le Pen et leurs amis ne proposent '),
(11, 'Haut-Rhin : entre Colmar et Mulhouse, les hauts et les bas du marché immobilier', 'Plus de deux milliards… c’est le nombre, en comptant les replay, de spectateurs ayant découvert à l’été 2018 le Bistrot des Lavandières, situé au cœur de la Petite-Venise de Colmar, dans l’émission de téléréalité « Chinese Restaurant ». Depuis que les stars chinoises ont quitté les fourneaux, le nombre de leurs compatriotes venus visiter ce condensé d’Alsace, avec ses maisons à colombages le long des canaux, a plus que doublé. Un afflux de touristes, dans une ville qui en accueillait déjà 4 millions par an, qu’il faut donc héberger.\r\n\r\nEn conséquence, « l’acquéreur lambda ne peut plus espérer trouver un bien en hypercentre », constate Mathieu Klein, de Century 21. Les petites surfaces y sont à présent toutes réservées à Airbnb, comme ce 27-m2 bien situé dans une bâtisse avec ascenseur – une rareté –, vendu 80 000 € soit près de 3 000 €/m2. Les Colmariens désertent ce secteur saturé et bouclé aux voitures pendant le marché de Noël. A cinq minutes à pied, boulevard Saint-Pierre,…\r\n\r\n', 'nekretnine', '2024-06-11 22:00:00', 0, 'image4.png', 'La demande reste soutenue dans le département.'),
(12, 'Dans la Meuse et les Vosges, la grisaille immobilière', 'Dans ces départements ruraux, vieillissants et laissés de côté par l’aménagement du territoire, les tout petits prix font le bonheur des investisseurs et de quelques primo-accédants.\r\n\r\nRépondant à « l’appel de Commercy », soixante-quinze délégations de « gilets jaunes » venues de toute la France convergeaient le 27 janvier dans la Meuse pour coordonner leur mouvement. Il était logique que cette petite commune de 5 600 habitants, représentative de ce que le démographe Hervé Le Bras appelle la « diagonale du vide », accueille l’assemblée des assemblées d’oubliés. Délaissée par les pouvoirs publics – avec la fermeture, en 2013, de la caserne, alors premier employeur local –, la ville de la madeleine se dépeuple. Sophie Koudlansky, de l’agence JDV Gestion, constate :\r\n\r\n« Grâce à l’installation des usines Safran et CMI, on vend encore quelques maisons autour de 1 000 €/m2. Mais il y a surtout des panneaux “à louer”. »\r\nSa voisine Bar-le-Duc meurt aussi à petit feu. « C’est une catastrophe sur le front de l’emploi, les jeunes partent chercher du travail dans les grandes villes et on parle de fermer notre préfecture », explique Sophie Thomas chez Stéphane Plaza. Sans épargne et avec des budgets\r\n\r\n', 'nekretnine', '2024-06-11 22:00:00', 0, 'image5.png', 'Dans ces départements ruraux, vieillissants.'),
(13, 'A Nancy, un horizon immobilier radieux', 'Le marché nancéien se porte toujours aussi bien. Et pour cause : les prix relativement bas et les taux bancaires attractifs permettent l’acquisition de biens qualitatifs sans pour autant perdre en pouvoir d’achat.\r\n\r\n« Il devrait y avoir des files d’attente dans les banques », affirme Eric Junger, courtier et directeur adjoint chez Crédit Expert, tant le marché nancéien est favorable. Un avis partagé par l’ensemble des acteurs du secteur immobilier, qui constatent que le volume des ventes est en constante hausse depuis 2016, « ce qui assure du mouvement sur le marché, autre indicateur de sa bonne forme », souligne Damien Gégout, notaire et membre de l’observatoire de l’immobilier de Meurthe-et-Moselle.\r\n\r\nLes taux bancaires, eux, « ne remontent pas, et restent à un niveau très bas », ajoute-t-il, ce qui séduit les jeunes actifs. Ainsi, les achats des primo-accédants représentent plus d’un tiers des transactions réalisées. « Aujourd’hui, un locataire peut acquérir un bien similaire à celui qu’il occupe pour des mensualités à peine plus élevées que son loyer, un gain énorme en matière de pouvoir d’achat et de qualité de vie », précise Grégory Pierre\r\n\r\n', 'nekretnine', '2024-06-11 22:00:00', 0, 'image6.png', 'Décryptage  Toute la France subit la crise immobili?re');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'p', 'p', 'pp', '$2y$10$8wYJwSzZLXTgIa1bxSCqB.BLinc6.ommgh/VEsjVHu2nTr6foSz5G', 1),
(12, 'pero', 'peric', 'peroperic', '$2y$10$MKlxee5lHRWYNgoQg2hMvek5K4urBUHyDQ/pFYWBdWEk2VAtW.QKO', 0),
(13, 'pero', 'peric', 'pero peric', '$2y$10$MqrQc0/18fDxZy84ol9OdOfxUgxWTS769c9rGKosKqEpLSsXzW1He', 0),
(14, 'pero', 'peric', 'peropericc', '$2y$10$ghuwvEtym0OQ6SMP.WLWA.6G4g8kgWqDlcte1BXMwu1.7PBAd2zq2', 0),
(15, 'f', 'f', 'f', '$2y$10$QZQDlY10b7Hcbrp4ZOR6KuQgnoxzojtj4ImypGvOi6ybMd9Ke9wiu', 0),
(16, 'ivan', 'ivic', 'ii', '$2y$10$5AdgP4KwitPnCmfKjZCbXuhvmlZB/8podn9cz80IoJC/7GTCngYHa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kor_name` (`korisnicko_ime`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
