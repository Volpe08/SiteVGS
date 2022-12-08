-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 08 déc. 2022 à 14:52
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vgs`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projet` varchar(255) NOT NULL,
  `nb_chap` varchar(11) NOT NULL,
  `data_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `projet`, `nb_chap`, `data_date`) VALUES
(7, 'A Girl Like Alien', '35', '2022-12-07'),
(2, 'A Girl Like Alien', '35.5', '2022-12-07'),
(3, 'A Girl Like Alien', '35.6', '2022-12-07'),
(4, 'A Girl Like Alien', '35.4', '2022-12-07'),
(8, 'Break The World', '35.4', '2022-12-07');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) NOT NULL,
  `commentaires` text NOT NULL,
  `projet` varchar(250) NOT NULL,
  `date_data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `mangas`
--

DROP TABLE IF EXISTS `mangas`;
CREATE TABLE IF NOT EXISTS `mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `nom_alternatifs` text NOT NULL,
  `auteur` text NOT NULL,
  `artiste` text NOT NULL,
  `status` text NOT NULL,
  `annee` int(11) NOT NULL,
  `genre` text CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `description` text NOT NULL,
  `nb_chap` int(11) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mangas`
--

INSERT INTO `mangas` (`id`, `nom`, `nom_alternatifs`, `auteur`, `artiste`, `status`, `annee`, `genre`, `description`, `nb_chap`, `date_update`) VALUES
(1, 'Break The World', 'Break The World', 'Hudie Lan Man You Yinli', 'Man You Yinli', 'en cours', 2018, 'Action , Aventure , Fantastique , Arts Martiaux', 'Break the World est un MMORPG manhua. Nous suivons le voyage de Feng Xiao dans sa quête d\'essayer simplement d\'explorer le jeu. Mais il doit faire face à  tous les problémes supplémentaires qui accompagnent la lecture d\'un jeu vidéo en première. Le jeu fonctionnera-t-il jamais ? Découvrez-le dans Break The World.', 4, '2021-09-04'),
(2, 'Cross Days', 'Cross Days', 'SAKAZUKI Homare', 'SAKAZUKI Homare', 'en cours', 2018, 'Drame , Harem , Psychologique , Romance , Vie Scolaire', 'Yuuuki Ashikaga est un étudiant de première année du secondaire à son deuxième semestre à l\'Académie Sakakakino. Après ses visites régulières à la bibliothèque de l\'école, il est tombé amoureux de Kotonoha Katsura, un camarade de classe venu pour la lecture. Bien qu\'elle ait déjà un petit ami, elle partage véritablement ses intérêts. Cependant, les choses se se compliquent lorsque, à la suite d\'une brève rencontre, sa soeur, Chie Ashikaga, lui présente Roka Kitsuregawa, une connaissance qui lui aussi en raffole. Par rancune jalouse pour sa rivale, Roka tente de dissuader Yuuuki en affirmant aimer Makoto Itou, un autre camarade de classe. Son mensonge se retourne de façon dramatique, alors que Yuuuki, conscient du fait que Makoto est le petit ami de Kotonoha, va lui poser des questions sur cette affaire. Remarque : Cross Days se situe au milieu du scénario initial de School Days et fournit une autre version de la façon dont les choses auraient pu se dérouler.', 7, '2020-02-12'),
(3, 'Demon King in Distress', 'Demon King in Distress', 'Enda Marimo', 'Enda Marimo', 'en cours', 2018, 'Aventure , Comédie , Ecchi , Surnaturel', 'Le diable qui a perdu son pouvoir magique dans la lutte contre les anges longs accomplit le principe d\'absorber l\'âme humaine et de restaurer son pouvoir ! C\'était un roi démoniaque qui voyageait dans le monde humain avec quatre rois célestes en qui j\'avais confiance, mais la destination que j\'atteignis était une île solitaire de l\'océan... ! Sur cette île où la magie ne peut pas être utilisée, une survie qui peut rire à l\'envers avec la tristesse des souverains et des subordonnés dans le Makai commence !', 6, '2020-02-12'),
(4, 'Denpa Kyoushi', 'Denpa Kyoushi', 'AZUMA Takeshi', 'AZUMA Takeshi', 'en cours', 2011, 'Comédie , Harem , Romance', 'Kagami Junichirou est connu comme étant un Physicien de Génie. Il écrit une thèse malgré son jeune âge qui est de 17 ans et il a été même été publié par\'la Nature\' un magazine de science connu. Après l\'université, il s\'est consacré à être un Otaku et un NEET. Il met à jour son Blog d\'Anime,visant la première place . Il prétend avoir une maladie qui lui fait faire SEULEMENT ce qu\'il veut faire. Désespéré qu\'il ne fasse rien de sa vie, sa petite soeur réussit à lui obtenir un travail comme professeur à l\'université ou il a étudié.', 15, '2021-03-14'),
(5, 'Drawing While Masturbating', 'Drawing While Masturbating', 'IGARASHI Yui', 'IGARASHI Yui', 'en cours', 2018, 'Comédie , Ecchi , Romance , Seinen , Adulte', 'Ashida Mamoru est une assistante manga divin, mais son habitude de devenir paresseuse l\'a laissé sans travail. Heureusement, l\'un de ses camarades de classe de l\'université a une petite sœur qui est un auteur de manga en série et qui a besoin d\'un assistant.', 9, '2021-03-06'),
(6, 'Hachinan tte, Sore Wa Nai Deshou!', 'Hachinan tte, Sore Wa Nai Deshou!', 'Y.A', 'Kusumoto Hiroki', 'en cours', 2017, 'Action , Aventure , Comédie , Drame , Fantastique , Harem , Romance , Shonen', 'Shingo Ichinomiya, un jeune homme de 25 ans travaillant dans une grande entreprise, s\'endort encore une fois, en pensant à sa journée remplie du lendemain. Cependant, en se réveillant, il se trouve dans une chambre qu\'il ne reconnaît pas et réalise qu\'il est dans le corps d\'un jeune garçon de 6 ans. Il va rapidement découvrir qu\'il fait partie d\'une famille pauvre, vivant dans un village reculé.', 17, '2020-02-12'),
(7, 'Happy Sugar Life', 'Happy Sugar Life', 'Kagisora Tomiyaki', 'Kagisora Tomiyaki', 'en cours', 2015, 'Drame , Horreur , Mystère , Vie Scolaire , Shonen', 'La lycéenne Matsuzaka Sato a la réputation d\'être facile, mais un jour sa vie de coucher avec un garçon après l\'autre prend fin. Cela se produit lorsqu\'elle rencontre l\'enfant Shio, pour qui elle est convaincue de ressentir un véritable amour pour la première fois. Sato peut sembler douce et innocente, mais elle ne fera rien pour protéger leur vie ensemble, même pour commettre un meurtre. Mais d\'où a-t-elle acquis la petite fille et combien de temps peuvent durer leur \"Happy Sugar Life\"?', 4, '2020-12-06'),
(8, 'Honkai Impact 3rd - 2nd Lawman', 'Honkai Impact 3rd - 2nd Lawman', 'MiHoYo', 'MiHoYo, Ego', 'en cours', 2018, 'Action , Drame , Mecha , Sci-fi , Webtoon', '363/5000 \"Le 1er février 2001. Tout le personnel de recherche de l\'installation de Shicksals Babylon en Sibérie a disparu du jour au lendemain. Tandis que Theresa enquête sur ce mystère sous les ordres d\'Otto, Walter et Einstein se préparent à sa comparution. La table est prête pour le deuxième Impact de Honkai. \" Chronologie : 14 ans avant le début de la partie. L\'arc est toujours en cours.', 11, '2020-02-12'),
(9, 'Jaryuu Tensei', 'Jaryuu Tensei', 'SETO Meguru', 'HASHIMOTO Yuushi', 'en cours', 2016, 'Action , Aventure , Comédie , Harem , Romance , Vie Scolaire', 'L\'histoire raconte l\'histoire d\'un gars décédé des suites d\'un accident de voiture à cause d\'un jeune couple en train de s\'embrasser (quelle malchance !). Et il s\'est réincarné dans un monde fantastique - mais sous la forme d\'un dragon ! Un extrêmement puissant ? Voyons commenter \"notre\" personnage principal vit comme un dragon !', 11, '2020-02-12'),
(10, 'Karate Baka Isekai', 'Karate Baka Isekai', 'Terui Eito', 'buun150', 'en cours', 2019, 'Action , Fantastique , Isekai', 'Un pratiquant de karaté qui a été transféré dans un autre monde refuse les techniques de triche données par la déesse et poursuit son propre karaté dans un autre monde.', 5, '2021-08-31'),
(11, 'Kitaku Tochuu de Yome to Musume ga dekita n dakedo, Dragon datta', 'Kitaku Tochuu de Yome to Musume ga dekita n dakedo, Dragon datta', 'FUKAKUTEI Waon', 'AMANO Kohitsuji', 'en cours', 2018, 'Comédie , Fantastique , Romance , Seinen , Tranche de vie', 'Un pratiquant de karaté qui a été transféré dans un autre monde refuse les techniques de triche données par la déesse et poursuit son propre karaté dans un autre monde.', 5, '2020-02-12'),
(12, 'KoLD8 King of the Living Dead', 'KoLD8 King of the Living Dead', 'Pageratta', 'Pageratta', 'en cours', 2018, 'Horreur , Shonen', 'Les zombies ont occupé le Japon en seulement un mois. Pour éviter d\'être infecté par des zombies, Eito Hasaba, avec sa mère et sa sœur cadette, se dirigent vers un \"secteur\", une zone de sécurité bloquée. Mais peu après leur arrivée, Eito se blesse gravement lors d\'un désaccord et est expulsé du secteur. Avec sa conscience faiblissante, Eito voit une meute de zombies arriver et se résigne à son sort. Mais que découvre-t-il à son réveil ? L\'histoire d\'un anti-héros mort-vivant commence.', 2, '2020-12-06'),
(13, 'Kouritsu Kuriya Madoushi, Daini no Jinsei de Madou o Kiwameru', 'Kouritsu Kuriya Madoushi, Daini no Jinsei de Madou o Kiwameru', 'Kenkyo na Circle', 'ASAKAWA Keiji', 'en cours', 2015, 'Action , Aventure , Comédie , Fantastique , Harem , Romance', 'Zeff Einstein à passer sa vie à maîtriser la magie rouge et a finalement été reconnu pour ça. Néanmoins, un sort nouvellement créé révéla que son talent pour la magie rouge était le plus bas. Amère à la pensée d\'avoir gaspillé son temps, Zeff créa un sort afin de voyager dans le temps dans le but de rencontrer sa version plus jeune. Accompagné du mage Milly et de l\'épéiste Claude, il a bien l\'intention de maîtriser la magie de manière plus efficace cette fois-ci.', 19, '2020-02-12'),
(14, 'Magi Craft Meister', 'Magi Craft Meister', 'Aki Gitsune', 'Aki Gitsune', 'en cours', 2016, 'Action , Aventure , Fantastique , Harem , Romance , Sci-fi , Shonen , Tranche de vie , Surnaturel', 'Il n\'y a qu\'un seul Magi Craft Meister au monde. À la mort du dernier Meister, Jin Nidou des centaines d\'années plus tard fût transporté dans un autre monde enfin de lui succéder et d\'accomplir sa volonté. Après avoir obtenu les connaissances des Magi Craft Meister, Jin tente d\'utiliser un portail de téléportation défectueux, ce qui le téléporta dans un monde inconnu. En plus de cela, une automate qu\'il a récemment restauré utilise aussi le téléporteur dans le but de trouver son \"père\". Ainsi, commencez l\'aventure du nouveau Magi Craft Meister !', 24, '2020-02-12'),
(15, 'Maou no Hajimekata', 'Maou no Hajimekata', 'WARAU Yakan', 'KOMIYA Toshimasa', 'en cours', 2015, 'Action , Aventure , Drame , Fantastique , Harem , Mature , Seinen , Surnaturel , Adulte', 'Après avoir consacré sa vie à la recherche sur les arcanes, Aur a finalement découvert les secrets pour devenir un Roi Démon. Utilisant son nouveau pouvoir pour invoquer une sublime succube, Lilu, Aur commence à batîr une série vertigineuse de halls semblables à un labyrinthe qui deviendra sa forteresse. Ainsi commence la sombre aventure fantastique d\'un Roi Démon à la conquête du monde humain en qui il n\'a jamais eu confiance !', 13, '2020-02-12'),
(16, 'Nano Hazard', 'Nano Hazard', 'Kurihara Shoushou', 'Kazaana', 'en cours', 2018, 'Action , Shonen , Tranche de vie', 'Le rêve d\'Enjou Shuuto a toujours été de devenir détective et d\'éliminer la raclure qui avait tué son père. En pratique, il affronte les brutes locales à chaque occasion afin de se faire la main. Mais que se passe-t-il lorsque des nanobots voyous descendent dans son quartier, boostant les capacités de leurs hôtes ?', 8, '2020-02-12'),
(17, 'Nozomi x Kimio', 'Nozomi x Kimio', 'HONNA Wakou', 'HONNA Wakou', 'en cours', 2011, 'Comédie , Ecchi , Romance , Shonen , Tranche de vie', 'Suga Kimio se retrouve caché dans les vestiaires des filles, incapable de bouger ou de fuir. Komine Nozomi, une des filles de sa classe le trouve en ouvrant son casier. A sa grande surprise, Nozomi referme aussitôt son casier et attend que toutes les filles s’en aillent afin de laisser Kimio repartir. Plus tard, cette nuit-là, il reçoit un message de Nozomi habitant dans le même immeuble que lui. Celle-ci le fait chanter et le persuade de se « dévoiler mutuellement » sous couvert de ruiner sa vie scolaire. Pour les deux, commence alors un « peep-show » au travers de leurs fenêtres…', 33, '2020-02-12'),
(18, 'Shame Application', 'Shame Application', 'Fujoking', 'Fujoking', 'en cours', 2019, 'Ecchi , Josei , Romance , Yaoi', 'Un mannequin célèbre et un ancien camarade de classe du lycée seront liés par une application qui les obligerait à obéir, se faisant humilier. Qu\'attendriez-vous d\'une application qui a sa propre \"vie\"? Comment vont-ils assumer cette humiliation? L\'avertissement n\'était pas suffisant! L\'oeuvre va être sortie sous peu pour le premier chapitre il est en court d\'édition merci de patienté', 9, '2020-02-12'),
(19, 'Sweet Candy', 'Sweet Candy', '??', '??', 'en cours', 2018, 'Comédie , Romance , Webtoon', 'Li Xiao Guo est une nouvelle infirmière de l\'hôpital Jiayu. Sa vie prend une tournure dramatique quand une série d\'incidents malheureux se produisent. Ses parents se font arnaquer avec leurs économies, sa famille est de plus en plus endettée, son téléphone est volé et le travail de Xiao Guo est menacé. Désespérée, Xiao Guo essaie de vendre son sang pour de l\'argent rapidement. En même temps, un patient spécial est admis à l\'hôpital et le monde de Xiao Guo est bouleversé. Il devient vite évident que Xiao Guo et ce nouveau patient sont liés par plus d\'une simple coïncidence ....', 23, '2020-02-12'),
(21, 'World Teacher - Isekaishiki Kyouiku Agent', 'World Teacher - Isekaishiki Kyouiku Agent', 'NEKO Kouichi', 'YOSHINO Sora', 'en cours', 2018, 'Action , Aventure , Comédie , Drame , Fantastique , Harem , Romance , Vie Scolaire\r\n\r\n', 'Un homme qui était autre fois appelé l\'agent le plus puissant du monde a fini par devenir enseignant après sa retraite, pour former une nouvelle génération d\'agents. Après de nombreuses années d\'entraînement de ses disciples, il a été tué à l\'âge de 60 ans par une organisation secrète et s\'est réincarné dans un autre monde, ses souvenirs étant intacts. Bien qu\'il ait été surpris par l\'existence de la magie et des espèces étranges de ce monde, il s\'est rapidement adapté à sa condition de nouveau-né et en a profité. Il a acquis une magie spéciale et acquis une force considérable grâce à sa discipline rigoureuse afin d\'atteindre son objectif: reprendre sa carrière d\'enseignant qu\'il a quitté à mi-parcours dans sa vie antérieure. C’est l’histoire d’un homme qui, s’appuyant sur les souvenirs et les expériences de sa vie antérieure, est devenu un enseignant qui parcourt le monde avec ses élèves. Adaptation du lite novel.', 17, '2020-02-12'),
(22, 'A Girl Like Alien', 'A Girl Like Alien', 'Nebillim', 'Nebillim', 'en pause', 2020, 'Comédie , Tranche de vie', 'Gil Cho-Rong avait soudainement changé après les vacances d\'été en troisième année de collège. Ses cheveux avaient été teints en vert ...', 4, '2022-12-07'),
(23, 'Free Life Isekai Nandemoya Funtouki', 'Free Life Isekai Nandemoya Funtouki', 'Kigatsukeba Kedama', 'Mori Airi', 'en pause', 2018, 'Action , Aventure , Comédie , Drame , Fantastique , Harem , Seinen', 'Sayama Takahiro, un lycéen insouciant, a été transporté dans un monde fantastique identique à celui d\'un certain jeu VR. Son attitude de \" go-with-the-flow \" a fini par l\'emporter sur son désir de rentrer chez lui, et maintenant il dirige \" Free Life \", une petite entreprise qui se consacre à répondre aux demandes de ses clients. Avec l\'aide de Yumiel, quel genre de travail Sayama finira-t-il par faire ?', 4, '2020-12-06'),
(24, 'Isekai Maou To Shoukan Shoujo Dorei Majutsu', 'Isekai Maou To Shoukan Shoujo Dorei Majutsu', 'MURASAKI Yukiya', 'FUKUDA Naoto', 'en pause', 2015, 'Action , Aventure , Comédie , Fantastique , Harem , Romance , Shonen , Isekai', 'Sakamoto Takuma se vante d\'avoir une force exceptionnelle qui lui est suffisante pour être appelé le \"Roi Démon\" par les autres joueurs. Un jour, il est invoqué dans un autre monde avec la même apparence que dans le jeu. Là-bas se trouvent deux personne se déclarant être \"le vrai maître invocateur\". Takuma fut réduit en esclavage magique dû à un sort lancé par les deux filles. Cependant, l\'habilité {Magic Reflection} a été invoquée ! Ceux réduit à l\'état d\'esclave sont maintenant les filles ! Takuma est désorienté. Il est le plus puissant magicien mais, il ne possède aucun talent pour communiquer. Paniqué, les premiers mots qui sortent de sa bouche sont ceux qu\'il utilisé dans le jeu où il jouait le rôle de Roi Démon ! ? \"Je suis incroyable vous dites ? Bien sûr que je le suis. Je suis Diablo.................. Celui craint sous le nom de Roi Démon !\" Ceci est l\'histoire du (faux) Roi Démon qui inspirera bientôt le monde et de ses autres aventures à travers le monde dans lesquels il plongeât avec son immense pouvoir, que l\'histoire débute.', 18, '2020-02-12'),
(25, 'Universe And Sword', 'Universe And Sword', 'SIN', 'SIN', 'en pause', 2019, 'Action , Aventure , Fantastique , Vie Scolaire , Sci-fi , Surnaturel , Webtoon', 'Un jeune garçon qui veut devenir un héros, Wuju, rencontre un jour le vrai héros qu\'il admire ? Le jeune garçon qui voulait devenir un héros, Wuju, devint à la place l\'épée du héros.', 6, '2021-03-13'),
(26, 'Stresser', 'Stresser', 'JIXKSEE', 'JIXKSEE', 'en pause', 2019, 'Action , Drame , Surnaturel , Webtoon', 'Histoire de personnes atteintes du syndrome de stress excessif et de l\'équipe DS qui tentent de les sauver, et de la fille du secondaire, Lee Hagyung.', 6, '2020-02-12'),
(27, 'Kantai Collection -KanColle- KanColle Manga (Doujinshi)', 'Kantai Collection -KanColle- KanColle Manga (Doujinshi)', 'Funny Rocket (Circle) , Nichika', 'Funny Rocket (Circle) , Nichika', 'termines', 2019, 'Comédie , Drame , Shojo Ai , Tranche de vie , Yuri', 'Les mésaventures des cuirassés incarnent les petites filles de la série Kantai Collection.', 3, '2020-12-06'),
(28, 'Kimetsu No Aima!', 'Kimetsu No Aima!', 'Funny Rocket (Circle) , Nichika', 'Funny Rocket (Circle) , Nichika', 'termines', 2019, 'Action , Aventure , Comédie , Drame , Historique , Arts Martiaux , Shonen , Surnaturel', 'Un manga gag manga manga manga à quatre panneaux dérivé du manga Kimetsu no Yaiba. Le manga présentera des versions SD des personnages du manga principal. Et il sortira après la première de chaque épisode de l\'anime, avec des histoires couvertes par l\'anime. Liens Webcomic original', 5, '2020-02-12'),
(29, 'Five Senses', 'Five Senses', 'Momoko Suika', 'Momoko Suika', 'termines', 2017, 'Romance , Tranche de vie , Yaoi', 'Sumi Keisuke vit comme professeur dans une université et est attirée par un étudiant, Shiromoto Kotarou, qui devient rapidement sa nouvelle muse. Keisuke finit par désirer le garçon avec obsession, se cramponnant à lui avec ses cinq sens.', 7, '2020-02-12'),
(35, 'Love Live! - Taiiku Souko de Futarikiri ni Naru Omajinai in MakiPana (Doujinshi)', 'Love Live! dj - A Charm to be All Alone in the Gym Storage in MakiPana ?????! dj - ????????????????? in???? ????????????????? in????', 'Siva', 'Siva', 'termines', 2020, 'Comédie, One shot, Romance, Yuri', ' ', 1, '2020-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `birthdate` date NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `birthdate`, `admin`) VALUES
(1, 'Volpe', 'volpgangscantrad@gmail.com', '03d87cf10d18efb61eeceec718a6bca0', '2001-01-08', 0),
(2, 'Karao', 'liamvaganay61@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2001-08-18', 0),
(6, 'araao', 'fdzdragon82@gmail.com', '03d87cf10d18efb61eeceec718a6bca0', '2000-01-01', 0),
(7, 'Nolvshy', 'yukilovewaifu@gmail.com', '906e047e09378b875ea96799f23fc36d', '2000-10-06', 0),
(8, 'Volpe08', 'f.rivetdurzy@gmail.com', 'a34ddc352aa9a504e0b14d3bb85773b1', '2001-01-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `role` text NOT NULL,
  `grade` text NOT NULL,
  `Admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `pseudo`, `role`, `grade`, `Admin`) VALUES
(2, 'Meless', 'Trad, Edit en formation, Check', 'Cheffe Check', 1),
(22, 'Volpe', 'edit, clean, coloriste, Leader', 'Leader', 1),
(23, 'Ahily', 'Clean', 'Cheffe Clean', 1),
(7, 'Gags', 'trad, edit', 'Chef Trad', 1),
(8, 'Lisachat', 'edit', 'Cheffe Edit', 1),
(9, 'Lovenyu', 'trad, edit, check', 'Sous-chef Check', 1),
(10, 'Marion', 'trad', 'Sous-chef Trad', 1),
(11, 'Fanthom', 'trad', '', 0),
(17, 'Robin', 'coloriste', '', 0),
(18, 'Jared', 'trad, check', '', 0),
(26, 'Nolvshy', 'Coloriste', 'Chef Coloriste', 1),
(21, 'Karao', 'Développeur', 'Développeur', 1),
(27, 'Volpe08', 'edit, clean, coloriste, Leader', 'Leader', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
