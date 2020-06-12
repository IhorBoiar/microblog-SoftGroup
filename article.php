<?php
$connect = mysqli_connect('127.0.0.1', 'root', '', 'micro_blog_test');

session_start();

$_SESSION['login'];
$_SESSION['password'];
$_SESSION['id'] = $_GET['id'];
$_SESSION['role'];

if ($_SESSION['login'] == false) {
    echo '<a href="index.php">Авторизуйтеся, будь ласка!</a>';
    exit();
}

?>

<?php
if ($_SESSION['role'] == 'admin') {
    include "header-admin.php";
} elseif ($_SESSION['role'] == 'user') {
    include "header.php";
}

?>
<style>
    #imageBlog {
        display: block;
        width: 60%;
        margin: 10px auto;
        border-radius: 50%;
    }
</style>
<body>

<?php

$article = mysqli_query($connect, "SELECT * FROM `articles` WHERE `id` = " . $_GET['id']);
$res = mysqli_fetch_assoc($article);

?>

<div class="container content font-italic">

<?php
    if ($_SESSION['role'] == 'admin') {
?>

    <div class="row">
        <div class="col-10">
        </div>
        <div class="col-2">
            <a href="delete-article.php" class="btn btn-danger">Видалити статтю</a>
        </div>
    </div>

<?php
    }
?>

    <h1 class="text-center"><?php echo $res['title'] ?></h1>
    <div class="text-center"><img src="images/<?php echo $res['image'] ?>" alt="image" id="imageBlog">
    </div>
    <p><?php echo $res['text']  ?></p>
    <div class="row">
        <div class="col-6">
            <p class="font-weight-bold">Коментарі:</p>
            <p>
                <?php
                $login = $_SESSION['login'];
                $text = $_POST['comment'];
                $article_id = $_GET['id'];

        if (isset($_POST['send'])) {
                mysqli_query($connect, "INSERT INTO `comments`(`author`, `text`, `article_id`) VALUES ('$login', '$text', '$article_id')");
            }

            $comment =  mysqli_query($connect, "SELECT * FROM `comments` WHERE `article_id` = " . $_GET['id']);

        ?>
            </p>
            <br>
            <?php
            if (mysqli_num_rows($comment) <= 0)
            {
                echo '<p>Немає коментарів...</p>';
            }
            while ($com = mysqli_fetch_assoc($comment)) {
                $id = $com['id'];?>

                <ul>
                    <li>
                        <?php

                        echo '<b>' . $com['author'] . '</b>' . ': ' . '<br>' . '"' . $com['text'] . '"' . '<br>'
                            . 'Додано: ' . $com['pubdate']   ?>
                        <?php
                        if ($com['author'] == $login) {
                            echo '<a href="delete-comment.php?id='.$id.'"><button type="button" class="btn btn-danger">Видалити</button></a>';
                        }
                        ?>
                    </li>
                </ul>
                <?php
            }
            ?>
        </div>
        <div class="col-6"><p class="font-weight-bold">Коментувати:</p>
            <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">Натисніть тут</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" role="dialog" id="commentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    Додайте тут ваш коментар
                </h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="" method="post">
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" placeholder="Ваш коментар">
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" name="send" value="Коментувати">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

include "footer.php";

?>

<script type="text/javascript" src="library/jquery/jquery.min.js"></script>
<script type="text/javascript" src="library/bootstrap/js/bootstrap.js"></script>
</body>
</html>