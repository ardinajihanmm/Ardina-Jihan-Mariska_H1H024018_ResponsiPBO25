<?php
declare(strict_types=1);

abstract class Pokemon
{
    protected string $name;
    protected string $type;
    protected int $level;
    protected int $hp;
    protected string $specialMoveName;

    public function __construct(string $name, string $type, int $level, int $hp, string $specialMoveName)
    {
        $this->name = $name;
        $this->type = $type;
        $this->level = max(1, $level);
        $this->hp = max(1, $hp);
        $this->specialMoveName = $specialMoveName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function getSpecialMoveName(): string
    {
        return $this->specialMoveName;
    }

    public function increaseLevel(int $amount): void
    {
        if ($amount < 0) {
            return;
        }
        $this->level += $amount;
    }

    public function increaseHp(int $amount): void
    {
        if ($amount < 0) {
            return;
        }
        $this->hp += $amount;
    }

    /**
     * Metode utama untuk menjalankan satu sesi latihan.
     * Mengembalikan data sebelum & sesudah latihan untuk ditampilkan.
     */
    public function train(TrainingSession $session): array
    {
        $beforeLevel = $this->level;
        $beforeHp = $this->hp;

        $effect = $this->calculateTrainingEffect($session);

        $this->increaseLevel($effect['levelGain']);
        $this->increaseHp($effect['hpGain']);

        return [
            'beforeLevel' => $beforeLevel,
            'afterLevel'  => $this->level,
            'beforeHp'    => $beforeHp,
            'afterHp'     => $this->hp,
            'description' => $effect['description'],
        ];
    }

    /**
     * Setiap tipe Pokémon punya gaya latihan yang berbeda.
     * Ini menerapkan konsep Polymorphism & Abstraction.
     */
    abstract protected function calculateTrainingEffect(TrainingSession $session): array;

    /**
     * Jurus spesial Pokémon.
     */
    abstract public function specialMove(): string;
}
