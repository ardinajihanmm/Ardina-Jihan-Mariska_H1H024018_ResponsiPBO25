<?php
declare(strict_types=1);

abstract class GrassPokemon extends Pokemon
{
    // Modifier khusus tipe Grass (regenerasi & ketahanan)
    protected float $attackMultiplier = 1.1;
    protected float $defenseMultiplier = 1.2;
    protected float $recoveryMultiplier = 1.3;

    protected function calculateTrainingEffect(TrainingSession $session): array
    {
        $intensity = $session->getIntensity();
        $type = strtolower($session->getTrainingType());

        $levelGain = 0;
        $hpGain = 0;
        $description = '';

        switch ($type) {
            case 'attack':
                $levelGain = (int) ceil($intensity * 0.16 * $this->attackMultiplier);
                $hpGain = (int) ceil($intensity * 0.04);
                $description = 'Latihan serangan membuat serangan serbuk dan serapan energi Oddish lebih kuat.';
                break;

            case 'defense':
                $levelGain = (int) ceil($intensity * 0.11 * $this->defenseMultiplier);
                $hpGain = (int) ceil($intensity * 0.10 * $this->defenseMultiplier);
                $description = 'Latihan bertahan memperkuat daun dan akar sehingga lebih tahan serangan.';
                break;

            case 'speed':
                $levelGain = (int) ceil($intensity * 0.12);
                $hpGain = (int) ceil($intensity * 0.05);
                $description = 'Latihan kecepatan membantu Oddish bergerak lincah saat malam dan menghindari serangan.';
                break;

            case 'spesial moonlight bloom':
                $levelGain = (int) ceil($intensity * 0.18);
                $hpGain = (int) ceil($intensity * 0.12 * $this->recoveryMultiplier);
                $description = 'Pelatihan khusus di bawah sinar bulan, Oddish menyerap energi dan memulihkan dirinya secara besar-besaran.';
                break;

            default:
                // Latihan umum di padang rumput
                $levelGain = (int) ceil($intensity * 0.10);
                $hpGain = (int) ceil($intensity * 0.06 * $this->recoveryMultiplier);
                $description = 'Latihan eksplorasi di padang rumput memperkuat stamina dan adaptasi Oddish.';
                break;
        }

        return [
            'levelGain'   => max(0, $levelGain),
            'hpGain'      => max(1, $hpGain),
            'description' => $description,
        ];
    }
}
