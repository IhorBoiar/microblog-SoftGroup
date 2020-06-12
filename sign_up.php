<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'micro_blog_test');

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];

if (isset($_POST['sign_up']))
{
    $errors = [];

    if (trim ($_POST['login'] == '') )
    {
        $errors[] = "Введіть логін!";
    }
    if ($_POST['password'] == '')
    {
        $errors[] = "Введіть пароль!";
    }

    if ($_POST['password_2'] != $_POST['password'])
    {
        $errors[] = "Пароль введений неправильно!";
    }
    if (($_POST['name'] == '') )
    {
        $errors[] = "Введіть ваше ім'я!";
    }

    if (empty($errors))
    {
        mysqli_query($connect, "INSERT INTO `users` (`login`, `password`, `name`) VALUES ('$login', '$password', '$name')");
        header("Location:index.php");
    }
}

include "header.php";

?>

<div class="container content text-center font-italic">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-6">
            <a href="index.php" class="btn btn-primary btn-lg">Повернутися назад</a>
        </div>
    </div>
<?php
    if (!empty($errors)) {
        echo '<div style="color: red;">' . array_shift($errors) . '</div>';
    }
?>
    <form action="sign_up.php" method="post">
    Ваш логін:
    <p><label for=""><input type="text" name="login" value="<?php echo $_POST['login']?>" class="form-control"></label></p>
    Ваш пароль:
    <p><label for=""><input type="password" name="password" value="<?php echo $_POST['password']?>" class="form-control"></label></p>
    Повторіть пароль:
    <p><label for=""><input type="password" name="password_2" value="<?php echo $_POST['password_2']?>" class="form-control"></label></p>
    Ваше ім'я:
    <p><label for=""><input type="text" name="name" value="<?php echo $_POST['name']?>" class="form-control"></label></p>
    <p><input type="submit" value="Зареєструватися" name="sign_up" class="btn btn-secondary btn-lg"></p>
</form>
</div>

<?php

include "footer.php";