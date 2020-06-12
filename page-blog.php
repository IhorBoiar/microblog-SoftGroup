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

?>
<body>
<div class="container content">

<?php

if ($_SESSION['role'] == 'admin') {
?>
    <div class="row">
        <div class="col-10">
        </div>
        <div class="col-2">
            <a href="add-article.php" class="btn btn-success">Написати статтю</a>
        </div>
    </div>

<?php
}
?>



<?php

    $categories = mysqli_query($connect, "SELECT * FROM `articles_categories`");

    $article = mysqli_query($connect, "SELECT * FROM `articles`")

?>
    <h3 class="">В блозі є статей: <?php echo mysqli_num_rows($article) ?></h3>
<?php
    while ($art = mysqli_fetch_assoc($article)) {
        echo '<a style="color: black;" href="./article.php?id=' . $art['id'] . '"><h1 class="font-italic">' . $art['title'] . '</h1></a>';
?>

    <p>Категорія:
<?php

    foreach ($categories as $cat)
    {
        $art_cat = false;
        if($cat['id']== $art['categorie_id']) {
            $art_cat = $cat;
            break;
        }
    }
    echo $art_cat['title'];
?>
    </p>

<? echo '<p class="font-italic">' . mb_substr($art['text'], 0, 250, 'utf-8') . '...</p><hr>';
    }
?>

</div>


<?php
include "footer.php";

?>
</body>
</html>