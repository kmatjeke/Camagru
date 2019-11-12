<?php
// include 'database.php';
include_once "connect_db.php";

try {
	$pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// Структура таблицы `users`
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
        `user_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `username` VARCHAR(30) NOT NULL,
        `E_Mail` VARCHAR(255) NOT NULL,
        `Firstname` VARCHAR(255) NOT NULL,
        `Surname` VARCHAR(255) NOT NULL,
        `password` VARCHAR(255) NOT NULL,
        `token` VARCHAR(50) NOT NULL,
        `verified` VARCHAR(1) NOT NULL DEFAULT 'N') ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	// Структура таблицы `images`
	$sql .= "CREATE TABLE IF NOT EXISTS `images` (
			`id_images` int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`id_gallery` int(11) NOT NULL,
			`path_images` varchar(255) NOT NULL,
			`text_images` text NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	// Структура таблицы `commenst`
	$sql .= "CREATE TABLE IF NOT EXISTS `commenst` (
			`id_commenst` int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`id_images` int(11) NOT NULL DEFAULT '0',
			`user_name` varchar(255) NOT NULL,
			`text_commenst` text NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
			
	$sql .= "CREATE TABLE IF NOT EXISTS `likes` (
			`id` int(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
			`user_id` varchar(255) NOT NULL,
			`post_id` int(11) NOT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
	// Admin1234
	$pdo->exec($sql);
	header('Location: ../index.php');
} catch (PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}  
?>

