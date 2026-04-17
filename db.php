<?php

$servername = "localhost";
$username = "root";
$password = "123456";
$dbName = "first";

$link = mysqli_connect($servername, $username, $password);
if (!$link) {
    die("Failed to connect: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
if (!mysqli_query($link, $sql)) {
    echo "Failed to create database: " . mysqli_error($link);
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "
    CREATE TABLE IF NOT EXISTS users(
        id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(15) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(20) NOT NULL
    )
";
if (!mysqli_query($link, $sql)) {
    echo "Failed to create table users: " . mysqli_error($link);
}

$sql = "
    CREATE TABLE IF NOT EXISTS posts(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(20) NOT NULL,
        main_text VARCHAR(400) NOT NULL
    )
";
if (!mysqli_query($link, $sql)) {
    echo "Failed to create table posts: " . mysqli_error($link);
}

mysqli_close($link);

?>