<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'micro_blog_test');

session_start();

$_SESSION['login'];
$_SESSION['password'];
$_SESSION['role'];

if ($_SESSION['role'] !== 'admin') {
    echo '<a href="index.php">You are not admin!</a>';
    exit();
}

include "header-admin.php";

?>
<style>
    ul {
      list-style-type: none;
    }
</style>
<div class="content container text-center">
    <h3>Можливості адмінінстратора:</h3>
    <br>
    <ul>
        <li>
            1. Додавати нову статтю в блог;
        </li>
        <li>
            2. Видаляти статті.
        </li>
    </ul>
    <br>
    <h3>Можливості користувача:</h3>
    <br>
    <ul>
        <li>
            1. Додавати та видаляти коментарі до статтей;
        </li>
        <li>
            2. Читати статті :)
        </li>
    </ul>
</div>

<?php

include "footer.php";