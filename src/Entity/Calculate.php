<?php
declare(strict_types=1);

namespace App\Entity;

final class Calculate
{
    private float $first;

    private float $second;

    private string $operation;

    public function getFirst(): float
    {
        return $this->first;
    }

    public function setFirst(float $first): void
    {
        $this->first = $first;
    }

    public function getSecond(): float
    {
        return $this->second;
    }

    public function setSecond(float $second): void
    {
        $this->second = $second;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): void
    {
        $this->operation = $operation;
    }

}
