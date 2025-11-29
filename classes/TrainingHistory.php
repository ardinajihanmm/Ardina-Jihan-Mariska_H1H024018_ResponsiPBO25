<?php
declare(strict_types=1);

class TrainingHistory
{
    /**
     * @var array<int, array<string, mixed>>
     */
    private array $sessions = [];

    public function addSession(TrainingSession $session, array $trainingResult): void
    {
        $this->sessions[] = [
            'type'        => $session->getTrainingType(),
            'intensity'   => $session->getIntensity(),
            'time'        => $session->getTime()->format('Y-m-d H:i:s'),
            'beforeLevel' => $trainingResult['beforeLevel'] ?? null,
            'afterLevel'  => $trainingResult['afterLevel'] ?? null,
            'beforeHp'    => $trainingResult['beforeHp'] ?? null,
            'afterHp'     => $trainingResult['afterHp'] ?? null,
            'description' => $trainingResult['description'] ?? '',
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getSessions(): array
    {
        return $this->sessions;
    }
}
