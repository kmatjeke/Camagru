<?php
// include 'database.php';
require 'database.php';
try {
  $pdo = new PDO($DB_DSN_FIRST, $DB_USER, $DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = 'CREATE DATABASE IF NOT EXISTS db_camagru';
  $pdo->exec($sql);
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}
try {
  $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE TABLE IF NOT EXISTS `users` (
	`user_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`username` VARCHAR(30) NOT NULL,
	`E_Mail` VARCHAR(255) NOT NULL,
	`Firstname` VARCHAR(255) NOT NULL,
	`Surname` VARCHAR(255) NOT NULL,
	`password` VARCHAR(255) NOT NULL,
	`token` VARCHAR(50) NOT NULL,
	`verified` VARCHAR(1) NOT NULL DEFAULT 'N',
  `notifications` VARCHAR(1) NOT NULL DEFAULT 'N') ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  $pdo->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS `pictures` (
  `id_pic` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `login` VARCHAR(30) NOT NULL,
  `date_creation` DATETIME NOT NULL,
  `pic` LONGBLOB NOT NULL)";
  $pdo->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `id_pic` INT UNSIGNED NOT NULL,
  `login` VARCHAR(30) NOT NULL,
  `date_creation` DATETIME NOT NULL)";
  $pdo->exec($sql);
  $sql = "CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `id_pic` INT UNSIGNED NOT NULL,
  `comment` VARCHAR(255) NOT NULL,
  `login` VARCHAR(30) NOT NULL,
  `date_creation` DATETIME NOT NULL)";
  $pdo->exec($sql);
}
catch (PDOException $e) {
  die('Error : ' . $e->getMessage());
}
$pdo = null;
header('Location: ../index.php');
?>