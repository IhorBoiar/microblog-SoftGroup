<?php
include "db.php";

$login = $_POST['login'];
$password = $_POST['password'];
?>

<?php

include "header.php";

?>

<div class="content container text-center">
    <p class="font-italic">Введіть свої дані або <a href="sign_up.php">зареєструйтеся</a></p>
    <form action="welcome.php" method="post">
        <label><input type="text" placeholder="login" value="<?php echo $_POST['login']  ?>" name="login" class="form-control"></label><br>
        <label><input type="password" placeholder="password" value="<?php echo $_POST['password']  ?>" name="password" class="form-control"></label><br>
        <input class="btn btn-secondary btn-lg" type="submit" name="sign_in" value="Увійти">
        </form>
        <br>
        <p><span class="font-italic">Адмін</span> - <b>login:</b> admin, <b>password:</b> admin.</p>
        <p><span class="font-italic">Юзер</span> - <b>login:</b> ihorboiar, <b>password:</b> 123.</p>
</div>

<?php

include "footer.php";

?>
</body>
</html>
