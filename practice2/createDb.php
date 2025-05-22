<?php
$servername = 'localhost';
$username = 'root';
$poassword = '';

// connect to mysql 
$conn = mysqli_connect($servername, $username, $poassword);

if (!$conn) {
    die("database connection failed" . mysqli_connect_error());
}

// create database 
$sql = "CREATE DATABASE my_new_database";

if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error" . mysqli_error($conn);
}

mysqli_close($conn);
?>