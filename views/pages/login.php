<?php

use App\Services\page;


session_start();
if (!$_SESSION['user']) {
    \App\Services\router::redirect('/profile');
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
    <h2 class="mt-4">Sign in</h2>
    <form class="mt-4" action="/auth/login" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email"
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>