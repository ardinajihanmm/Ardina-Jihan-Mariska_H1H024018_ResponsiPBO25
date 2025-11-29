<?php
declare(strict_types=1);

class TrainingSession
{
    private string $trainingType;
    private int $intensity;
    private DateTimeImmutable $time;

    public function __construct(string $trainingType, int $intensity, ?DateTimeImmutable $time = null)
    {
        $this->trainingType = $trainingType;
        $this->intensity = max(1, min($intensity, 100));
        $this->time = $time ?? new DateTimeImmutable();
    }

    public function getTrainingType(): string
    {
        return $this->trainingType;
    }

    public function getIntensity(): int
    {
        return $this->intensity;
    }

    public function getTime(): DateTimeImmutable
    {
        return $this->time;
    }
}
