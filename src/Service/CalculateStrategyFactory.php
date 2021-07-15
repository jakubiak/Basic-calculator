<?php
declare(strict_types=1);

namespace App\Service;

use Exception;

final class CalculateStrategyFactory implements CalculateStrategyFactoryInterface
{
    public function create(string $operation): CalculateStrategyInterface
    {
        return match ($operation) {
            'plus' => new PlusStrategy(),
            'minus' => new MinusStrategy(),
            'multiplication' => new MultiplicationStrategy(),
            'division' => new DivisionStrategy(),
            default => throw new Exception("operation not supported"),
        };
    }
}
