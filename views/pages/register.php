
<?php
use App\Services\page;

if (!$_SESSION['user']){
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
    <h2 class="mt-4">Sign up</h2>
    <form class="mt-4" action="/auth/register" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" name="fullName" class="form-control" id="fullName">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="exampleCheck1" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</body>
</html>