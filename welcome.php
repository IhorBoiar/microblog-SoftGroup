<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'micro_blog_test');

session_start();

$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];

$login = $_SESSION['login'];
$password = $_SESSION['password'];

$sign_in = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
if (mysqli_num_rows($sign_in) == 0) {
    echo 'Ви не зареєстровані!<br>Зареєструйтеся, будь ласка - <a href="sign_up.php">натисніть тут</a>';
    exit();
}

$admin = mysqli_fetch_assoc($sign_in);
$role = $admin['role'];
$_SESSION['role'] = $admin['role'];

if ($role == 'admin') {
    include "header-admin.php";
} elseif ($role == 'user') {
    include "header.php";
}

?>

<div class="content container text-center">

<?php
    if ($role == 'admin') {
?>
    <br>
    <h1 class="font-italic">Ласкавимо просимо Адмінінстратор -  <?php echo $login ?>!</h1>
    <br>
    <br>
    <br>
    <p><a href="page-blog.php" class="btn btn-secondary btn-lg btn-block">Перейти до статтей</a></p>


<?php
    } else {
?>

    <br>

    <h1 class="font-italic">Ласкавимо просимо, дорогий читач - <?php echo $login ?> !</h1>
    <br>
    <br>
    <br>
    <p><a href="page-blog.php" class="btn btn-secondary btn-lg btn-block">Читати статті</a></p>


<?php
    }
?>

</div>

<?php

include "footer.php";