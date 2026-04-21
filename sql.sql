/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: adaPortfolio
-- ------------------------------------------------------
-- Server version	10.11.11-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'','','','','','');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `album_types`
--

DROP TABLE IF EXISTS `album_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `album_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album_types`
--

LOCK TABLES `album_types` WRITE;
/*!40000 ALTER TABLE `album_types` DISABLE KEYS */;
INSERT INTO `album_types` VALUES
(1,'Grafika'),
(2,'Fotky'),
(3,'Portrety');
/*!40000 ALTER TABLE `album_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `texts` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT 'text' CHECK (json_valid(`texts`)),
  `cover_image` varchar(255) NOT NULL DEFAULT 'thumbnail.jpg',
  `location` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted` tinyint(1) DEFAULT 0,
  `type_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES
(1,'Slavnostní večer','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi aperiam assumenda atque aut beatae consequatur corporis doloremque dolorum eaque ex excepturi harum itaque pariatur praesentium quaerat qui quisquam ratione sit sunt tempora ullam veniam? Cum eum perspiciatis quisquam totam ullam, voluptas voluptatum. Deleniti ducimus facilis quibusdam quidem quod quos, ratione. Cupiditate dolorem esse fuga harum molestiae officia optio quas qui quibusdam sed? Ad, amet atque blanditiis consectetur, culpa delectus earum error fugit impedit officia provident qui sed sequi soluta tempora ullam veritatis. Assumenda cupiditate est, molestiae necessitatibus quo sint voluptatibus? Asperiores at delectus dolorum eligendi eos error et eum excepturi explicabo harum id impedit, in inventore ipsa ipsam iste labore magni maxime minima natus neque nisi placeat praesentium quidem quis, quisquam rem sapiente sequi similique sit tenetur ut vitae voluptate. Aperiam exercitationem ipsam nisi quaerat totam. Ad alias, amet animi delectus dignissimos distinctio dolor doloremque dolorum ea eos fugit illum ipsam mollitia nulla officiis pariatur quaerat quos ratione repudiandae sapiente sunt tenetur ullam voluptate. Cumque eligendi nam, optio quam quo rem totam velit. A aliquid at distinctio et fugit. Asperiores aspernatur autem cupiditate deleniti deserunt dignissimos doloremque eaque eligendi esse facere illum ipsam ipsum, libero, magnam magni minus modi molestias nisi odit officiis omnis optio perferendis provident quam qui quis quod reiciendis repellendus sapiente similique tempora tempore temporibus vel! Atque deserunt facilis iste iusto laboriosam minima nam sapiente? Accusamus earum eius eligendi exercitationem impedit minus perspiciatis quis ratione, tenetur. Ab, aperiam aut eaque enim eos explicabo fuga natus nulla quo sapiente tempora, tenetur? Ad aliquam amet labore laborum quo sint temporibus. Animi, atque labore? Deserunt eos facilis laudantium necessitatibus omnis possimus quae quos ut voluptates voluptatum! A accusamus adipisci aliquid amet, animi consectetur corporis debitis deleniti deserunt dignissimos distinctio ducimus eligendi esse eveniet facilis fuga fugiat fugit iusto libero nemo nesciunt nihil nobis non obcaecati odit officia perferendis praesentium quam qui quis quisquam quos, reprehenderit sapiente, similique unde velit voluptatibus. Accusamus aperiam aspernatur atque cupiditate debitis deserunt explicabo fugiat id illo inventore ipsam nam, porro rem, reprehenderit velit voluptate voluptatem. Accusamus consectetur debitis deserunt eius fuga incidunt quisquam reprehenderit tempore. Aliquam amet eos ex sequi similique sit temporibus ut? Assumenda ea facilis nostrum quibusdam saepe. Consequatur id, inventore laborum ratione suscipit ullam! Accusantium adipisci beatae consequatur, consequuntur dignissimos doloribus dolorum eligendi est exercitationem explicabo facere facilis fuga fugiat harum hic ipsam maiores molestias mollitia nemo neque, non praesentium quasi quibusdam quis quo sed voluptatibus voluptatum! Blanditiis, culpa dignissimos ex magnam maxime nobis provident quaerat quasi quia tempora! Amet consequatur debitis dolor doloremque dolores enim explicabo laboriosam, laborum minima officia omnis, porro quam, ratione rerum voluptatibus. Cum cupiditate delectus dolore, dolores ea expedita fugiat laudantium maiores, molestias neque nesciunt nobis pariatur perferendis, praesentium quae quas reiciendis sequi totam! Amet consectetur debitis dicta eaque illo, in, laboriosam, laborum molestias mollitia nemo odit omnis repudiandae voluptas. A ab ducimus exercitationem iure soluta? Architecto cum deserunt, eos est excepturi labore laborum molestiae nobis placeat quaerat quidem recusandae sit soluta tempore, voluptas? Quam, voluptatem!</p>','{}','thumbnail.jpg','Brno',1,'2025-03-24 13:18:19',0,0),
(2,'Vzpominka na vylet','Jedinecne momenty z vyletu do USA','{}','thumbnail.jpg','Praha',2,'2025-03-24 13:19:48',0,0),
(3,'Nové album','','{}','thumbnail.jpg','Praha',1,'2025-03-25 10:12:07',0,0),
(4,'Letní dobrodružství','Týdenní tábor plný her, soutěží a koupání','{}','thumbnail.jpg','Praha',1,'2025-03-25 08:22:00',0,0),
(5,'Rodinný piknik','Pohodová neděle s grilováním a hrami pro děti','{}','thumbnail.jpg','Praha',2,'2025-03-26 10:05:43',0,0),
(6,'Zimní radovánky','Lyžování a sněhové bitvy na horách','{}','thumbnail.jpg','Praha',1,'2025-03-27 14:14:22',0,0),
(7,'Podzimní barvy','Procházky mezi stromy hrajícími všemi barvami','{}','thumbnail.jpg','Praha',2,'2025-03-28 07:47:10',0,0),
(8,'Jarní výlet','Rozkvetlé louky, lesy a radost z přírody','{}','thumbnail.jpg','Praha',1,'2025-03-29 16:36:55',0,0),
(9,'Noční město','<p><strong>Experimenty s dlouhou expozicí v centru Prahy</strong></p>','{}','thumbnail.jpg','Praha',2,'2025-03-30 19:03:18',0,2);
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `admin` int(11) DEFAULT 0,
  `icon` varchar(255) DEFAULT 'fa-user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'admin','admin@admin','$2y$10$9BHEEXq/1OKS/MODU3WumOKqPq5L87y3QKtnMHLed6Y1xR79mPOv2',0,10,'fa-user'),
(2,'matous','matous.drabek@student.ossp.cz','$2y$10$eT8Mm0XbbnHJeixZKuE32uWSKRgp2UWlaqrO2emdySu06sUHxt4ji',0,0,'fa-user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-13 16:00:13
