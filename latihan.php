<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
$pageTitle = 'Latihan - PokéCare Oddish';

$error = null;
$lastResult = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainingType = $_POST['training_type'] ?? '';
    $intensityRaw = $_POST['intensity'] ?? '';

    if ($trainingType === '' || $intensityRaw === '') {
        $error = 'Semua field wajib diisi.';
    } else {
        $intensity = (int) $intensityRaw;
        if ($intensity <= 0) {
            $error = 'Intensitas latihan harus berupa angka positif.';
        } else {
            $session = new TrainingSession($trainingType, $intensity);
            $result = $pokemon->train($session);

            $history->addSession($session, $result);

            $_SESSION['pokemon'] = $pokemon;
            $_SESSION['history'] = $history;

            $lastResult = [
                'session' => $session,
                'detail' => $result,
                'specialMoveText' => $pokemon->specialMove(),
            ];
        }
    }
}



$pageSubtitle = 'Atur jenis dan intensitas latihan untuk meningkatkan kemampuan Oddish.';
require __DIR__ . '/partials/header.php';
?>
<section class="pokemon-card card">
    <h2>Sesi Latihan Oddish</h2>
    </p>

    <?php if ($error): ?>
        <div class="alert alert-error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <form action="" method="post" class="form">
        <div class="form-group">
            <label for="training_type">Jenis Latihan</label>
            <select name="training_type" id="training_type" required>
                <option value="">-- pilih jenis latihan --</option>
                <option value="Attack" <?= (($_POST['training_type'] ?? '') === 'Attack') ? 'selected' : '' ?>>Attack</option>
                <option value="Defense" <?= (($_POST['training_type'] ?? '') === 'Defense') ? 'selected' : '' ?>>Defense</option>
                <option value="Speed" <?= (($_POST['training_type'] ?? '') === 'Speed') ? 'selected' : '' ?>>Speed</option>
                <option value="Spesial Moonlight Bloom" <?= (($_POST['training_type'] ?? '') === 'Spesial Moonlight Bloom') ? 'selected' : '' ?>>Spesial Moonlight Bloom</option>
            </select>
            <p class="helper-text">
                Coba beberapa kombinasi jenis latihan untuk melihat efek yang berbeda pada level dan HP.
            </p>
        </div>

        <div class="form-group">
            <label for="intensity">Intensitas Latihan (1 - 100)</label>
            <input type="number" id="intensity" name="intensity" min="1" max="100"
                value="<?= htmlspecialchars($_POST['intensity'] ?? '25') ?>" required>
            <p class="helper-text">
                Semakin tinggi intensitas, semakin besar perubahan yang terjadi.
            </p>
        </div>

        <div class="actions mt-2">
            <button type="submit" class="btn btn-primary btn-full">Jalankan Latihan</button>
        </div>
        <div class="actions">
            <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
            <a href="riwayat.php" class="btn btn-outline">Lihat Riwayat Latihan</a>
        </div>
    </form>

    <hr class="divider">

    <h3>Status Saat Ini</h3>
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
    </div>

    <h3 class="mt-2">Ringkasan Latihan Terakhir</h3>
    <?php if ($lastResult): ?>
        <p class="muted">
            <?= htmlspecialchars($lastResult['session']->getTrainingType()) ?> · Intensitas
            <?= $lastResult['session']->getIntensity() ?>
        </p>
        <div class="result-grid">
            <div>
                <h4>Level</h4>
                <p><?= $lastResult['detail']['beforeLevel'] ?> → <strong><?= $lastResult['detail']['afterLevel'] ?></strong></p>
            </div>
            <div>
                <h4>HP</h4>
                <p><?= $lastResult['detail']['beforeHp'] ?> → <strong><?= $lastResult['detail']['afterHp'] ?></strong></p>
            </div>
        </div>
        <p class="muted">
            <?= htmlspecialchars($lastResult['detail']['description']) ?>
        </p>
        <div class="special-move">
            <strong>Jurus Spesial:</strong>
            <p><?= htmlspecialchars($lastResult['specialMoveText']) ?></p>
        </div>
    <?php else: ?>
        <p class="muted">
            Belum ada latihan di sesi ini. Jalankan latihan minimal satu kali untuk melihat
            perubahan level dan HP di bagian ini.
        </p>
    <?php endif; ?>
</section>
<?php
require __DIR__ . '/partials/footer.php';
?>
