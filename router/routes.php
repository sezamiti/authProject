<?php


use App\Services\router;
use App\controllers\auth;

router::page('/', 'home');
router::page('/login', 'login');
router::page('/register', 'register');
router::page('/profile', 'profile');

router::post('/auth/register', auth::class, 'register', true, true);
router::post('/auth/login', auth::class, 'login', true,);
//router::post('/auth/logout', auth::class, 'logout' );

router::enable();
?>





