<?php
declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    $baseDir = __DIR__ . '/classes/';
    $file = $baseDir . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

session_start();

if (!isset($_SESSION['pokemon']) || !($_SESSION['pokemon'] instanceof Oddish)) {
    $_SESSION['pokemon'] = new Oddish();
}

if (!isset($_SESSION['history']) || !($_SESSION['history'] instanceof TrainingHistory)) {
    $_SESSION['history'] = new TrainingHistory();
}

/** @var Oddish $pokemon */
$pokemon = $_SESSION['pokemon'];
/** @var TrainingHistory $history */
$history = $_SESSION['history'];
