<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';

$pageTitle = 'Beranda - PokéCare Oddish';
$pageSubtitle = 'Simulasi Latihan Pokémon - Trainer Oddish';
require __DIR__ . '/partials/header.php';
?>

<div class="page">
<section class="pokemon-card card">
    <h2>Informasi Dasar Pokémon</h2>

    <div class="card-pokemon">
        <img src="assets/oddish-card.png" alt="Oddish" class="card-pokemon-img">
    </div>
</section>


<section class="pokemon-card card">
    <h2>Profil Pokémon</h2>
    <p class="subtitle">
        Informasi tentang Oddish yang akan kamu latih di simulasi PokéCare
    </p>

    <div class="pokemon-info">
        <div>
            <div class="label">Nama</div>
            <div><?= htmlspecialchars($pokemon->getName()) ?></div>
        </div>
        <div>
            <div class="label">Tipe</div>
            <div><?= htmlspecialchars($pokemon->getType()) ?></div>
        </div>
        <div>
            <div class="label">Level</div>
            <div><?= $pokemon->getLevel() ?></div>
        </div>
        <div>
            <div class="label">HP</div>
            <div><?= $pokemon->getHp() ?></div>
        </div>
        <div>
            <div class="label">Jurus Spesial</div>
            <div><?= htmlspecialchars($pokemon->getSpecialMoveName()) ?></div>
        </div>
        <div>
            <div class="label">Habitat</div>
            <div><?= htmlspecialchars($pokemon->getHabitat()) ?></div>
        </div>
    </div>

    <p class="muted">
    </p>

    <div class="actions mt-2">
        <a href="latihan.php" class="btn btn-primary">Mulai Latihan</a>
        <a href="riwayat.php" class="btn btn-secondary">Lihat Riwayat Latihan</a>
    </div>
</section>
<?php
require __DIR__ . '/partials/footer.php';
?>
