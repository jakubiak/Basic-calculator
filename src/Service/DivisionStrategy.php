<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Calculate;

final class DivisionStrategy implements CalculateStrategyInterface
{

    public function calculate(Calculate $calculate): float
    {
        return $calculate->getFirst() / $calculate->getSecond();
    }
}
