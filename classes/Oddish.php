<?php
declare(strict_types=1);

class Oddish extends GrassPokemon
{
    private string $habitat;

    public function __construct(
        string $name = 'Oddish',
        string $type = 'Grass/Poison',
        int $level = 5,
        int $hp = 45,
        string $specialMoveName = 'Moonlight Bloom',
        string $habitat = 'Moonlit Meadow'
    ) {
        parent::__construct($name, $type, $level, $hp, $specialMoveName);
        $this->habitat = $habitat;
    }

    public function getHabitat(): string
    {
        return $this->habitat;
    }

    public function specialMove(): string
    {
        return sprintf(
            '%s menggunakan %s! Oddish memancarkan cahaya biru lembut, memulihkan dirinya dan melemahkan lawan.',
            $this->name,
            $this->specialMoveName
        );
    }
}
