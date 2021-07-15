<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\Calculate;

interface CalculateStrategyInterface
{
    public function calculate(Calculate $calculate): float;
}
