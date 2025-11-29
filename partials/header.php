<?php
if (!isset($pageTitle)) {
    $pageTitle = 'PokéCare - Oddish';
}
if (!isset($pageSubtitle)) {
    $pageSubtitle = 'Simulasi Latihan Pokémon - Trainer Oddish';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="page">
    <header class="header">
        <h1>PokéCare Center</h1>
        <p class="subtitle"><?= htmlspecialchars($pageSubtitle) ?></p>
    </header>
    <main class="main">
