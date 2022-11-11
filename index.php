<?php
session_start();

use App\Services\app;


require_once __DIR__ . "/vendor/autoload.php";
app::start();
require_once __DIR__ . "/router/routes.php";

