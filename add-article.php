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

if (isset($_POST['add'])) {
    echo "<pre>" . print_r($_FILES['image']['name']) . "</pre>";

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $local_image = "images/";
    move_uploaded_file($tmp_name, $local_image.$image);
}

$title = $_POST['title'];
$text = $_POST['text'];
$category = $_POST['category'];
$image = $_FILES['image']['name'];

if (isset($_POST['add']))
{
    $errors = [];

    if ($_POST['title'] == '')
    {
        $errors[] = "Введіть заголовок!";
    }
    if ($_POST['text'] == '')
    {
        $errors[] = "Введіть текст статті!";
    }

    if (empty($errors))
    {
        mysqli_query($connect, "INSERT INTO `articles`(`title`, `text`, `categorie_id`, `image`)
         VALUES ('$title', '$text', '$category', '$image')");
        $done = 'Ви додали запис! Можете додати ще один або перейти до ';
    }
}

include "header-admin.php";

if (!empty($errors)) {
    echo '<div style="color: red;">' . array_shift($errors) . '</div>';
}
?>

<div class="content container">

<?php
    if ($done == true) {
        echo $done . '<a href="page-blog.php" class="btn btn-primary">статтей</a>';
    }

?>

    <h3>Написати статтю:</h3>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
    <label>Назва статті<br><input type="text" name="title" class="form-control"> </label><br>
    <label>Зміст статті<br><textarea name="text" id="editor"  cols="140" rows="15" class="form-control"><?php echo $_POST['text'] ?></textarea></label><br>
    <p>Виберіть категорію: </p>
    <select name="category" class="form-control"><?php
            $select = mysqli_query($connect, "SELECT * FROM `articles_categories`");

            while($row = mysqli_fetch_assoc($select)) {

                ?>
                <option value="<?php echo $row['id']  ?>"><?php echo $row['title'] ?></option>
            <?php
            }
    ?></select><br>
    <p>Виберіть зображення:</p>
    <label><input type="file" name="image" id="ArticleImage"></label><br>
        <hr>
    <label><input type="submit" name="add" class="btn btn-success btn-lg btn-block" value="Додати статтю"></label>
</form>
</div>

<?php

include "footer.php";


