<?php
declare(strict_types=1);

namespace App\Service;

interface CalculateStrategyFactoryInterface
{
    public function create(string $operation): CalculateStrategyInterface;
}
