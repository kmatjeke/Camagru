<?php
include 'DB_connect.class.php';

try
{
    $pdo = new PDO($DB_DSN_FIRST, $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'CREATE DATABASE IF NOT EXISTS db_camagru';
    $pdo->exec($sql);
}
catch (Exception $e)
{
    die('Error : could not create DB ' . $e->getMessage());
}

try
{
    $pdo = new PDO($DB_DSN, $$DB_USER, $DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS `users` (
    `user_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL,
    `E_Mail` VARCHAR(255) NOT NULL,
    `Firstname` VARCHAR(255) NOT NULL,
    `Surname` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `token` VARCHAR(50) NOT NULL,
    `verified` VARCHAR(1) NOT NULL DEFAULT 'N')";

    $pdo->exec($sql);   // use exec() because no results are returned

    $sql = "CREATE TABLE IF NOT EXISTS `gallery` (
    `picture_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL,
    `creation_date` DATETIME NOT NULL);
    $pdo->exec($sql)";
}
catch (PDOException $e) {
    die('Error : ' . $e->getMessage());
}

$pdo = null;
?>