<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
$pageTitle = 'Riwayat Latihan - PokéCare Oddish';
$sessions = $history->getSessions();

$pageSubtitle = 'Ringkasan semua sesi latihan Oddish selama simulasi PokéCare.';
require __DIR__ . '/partials/header.php';
?>
<section class="card pokemon-card">
    <h2>Riwayat Latihan Oddish</h2>
    <p class="subtitle">
        Gunakan tabel ini untuk menjelaskan <strong>alur logika program</strong> dan
        <strong>perubahan state objek</strong> setelah beberapa kali latihan.
    </p>

    <?php if (empty($sessions)): ?>
        <p class="muted">
            Belum ada latihan yang tercatat. Jalankan latihan di halaman <strong>Latihan</strong> terlebih dahulu.
        </p>
        <div class="actions mt-2">
            <a href="latihan.php" class="btn btn-primary">Pergi ke Halaman Latihan</a>
            <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    <?php else: ?>
        <div class="table-wrapper mt-2">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Waktu</th>
                        <th>Jenis Latihan</th>
                        <th>Intensitas</th>
                        <th>Level Sebelum</th>
                        <th>Level Sesudah</th>
                        <th>HP Sebelum</th>
                        <th>HP Sesudah</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($sessions as $index => $s): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($s['time']) ?></td>
                        <td><?= htmlspecialchars($s['type']) ?></td>
                        <td><?= (int) $s['intensity'] ?></td>
                        <td><?= (int) $s['beforeLevel'] ?></td>
                        <td><strong><?= (int) $s['afterLevel'] ?></strong></td>
                        <td><?= (int) $s['beforeHp'] ?></td>
                        <td><strong><?= (int) $s['afterHp'] ?></strong></td>
                        <td class="muted small"><?= htmlspecialchars($s['description']) ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="actions mt-2">
            <a href="latihan.php" class="btn btn-secondary">Latihan Lagi</a>
            <a href="index.php" class="btn btn-outline">Kembali ke Beranda</a>
        </div>
    <?php endif; ?>
</section>
<?php
require __DIR__ . '/partials/footer.php';
?>
