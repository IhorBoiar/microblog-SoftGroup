<?php
session_start();
$_SESSION['id'];
$_SESSION['role'];

$page = $_SESSION['id'];

include "db.php";

$id = $_GET['id'];

$delete = mysqli_query($connect, "DELETE FROM `comments` WHERE `id` = ". $id);

echo "<meta http-equiv='refresh' content='0;url=article.php?id=" . $page . "'>";

if ($_SESSION['role'] == 'admin') {
    include "header-admin.php";
} elseif ($_SESSION['role'] == 'user') {
    include "header.php";
}

?>
<div class="content container text-center">
<h3>Your commentar deleted!</h3>
</div>
<?php
include "footer.php";