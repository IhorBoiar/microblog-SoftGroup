<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'micro_blog_test');

session_start();

$_SESSION['login'];
$_SESSION['password'];
$_SESSION['role'];

if ($_SESSION['login'] == false) {
    echo '<a href="index.php">Авторизуйтеся, будь ласка!</a>';
    exit();
}

if ($_SESSION['role'] == 'admin') {
    include "header-admin.php";
} elseif ($_SESSION['role'] == 'user') {
    include "header.php";
}

session_destroy();

?>
<div class="content container text-center">
<?php
   if ($_SESSION['role'] == 'admin') {
?>
    <br>
    <h1>Бувай, Адмінінстратор -  <?php echo $_SESSION['login'] ?> !</h1>
    <br>
    <br>
    <br>
    <p><a href="index.php" class="btn btn-secondary btn-lg btn-block">Зайти на сайт знову</a></p>
<?php
    } else {
?>
    <br>
    <h1>Ви вийшли з облікового запису, <?php echo $_SESSION['login'] ?>, бувайте!</h1>
    <br>
    <br>
    <br>
    <p><a href="index.php" class="btn btn-secondary btn-lg btn-block">Зайти на сайт знову</a></p>

<?php
    } ?>
</div>
<?php

include "footer.php";