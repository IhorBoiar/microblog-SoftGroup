<?php
include "db.php";

session_start();

$_SESSION['id'];

$id = $_SESSION['id'];

$delete = mysqli_query($connect, "DELETE FROM `articles` WHERE `id`= '$id'");
header("Location: page-blog.php");