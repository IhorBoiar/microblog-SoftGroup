<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Мій Блог</title>
    <link rel="stylesheet" href="1.css">
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        *
        {margin: 0;
        }
        html, body {
            height: 100%;
        }
        /*============ Основные стили =============*/
        body {
            background: #ffffff;
            color: #222222;
            font-family: Arial, Helvetica, sans-serif;
        }

        .content p {
            margin: 10px 0;
            font-size: 16px;
            line-height: 1.8;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        .logo {
        !important;font-size: 35px;
        }

    </style>
</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <?php
                if ($_SESSION['login'] == true) {
                    ?>
                    <span class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" focusable="false" role="img"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
                    </span>
                    <?php
                }
                ?>
            </div>
            <div class="col-4 text-center logo">
                <a class="blog-header-logo text-dark" href="page-blog.php">Мій Блог</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <?php
                if ($_SESSION['login'] == true) {
                    echo '<a class="text-muted" href="exit.php">Вийти</a>';
                }
                ?>
            </div>
        </div>
        <hr>
    </header>
</div>
