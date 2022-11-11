<?php

use App\Services\page;

session_start();


if (!$_SESSION['user']) {
    \App\Services\router::redirect('/login');
}


?>

<!doctype html>
<html lang="en">

<?php
page::part('head');
?>

<body>

<?php
page::part('navbar');
?>

<div class="container mt-4">
    <div class="jumbotron">
        <h1 class="display-4">Hello, <?= $_SESSION['user']['fullName'] ?>!</h1>
        <img src="<?= $_SESSION['user']['avatar'] ?>" height="300" alt="">
    </div>
</div>
</body>
</html>