<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\Color;

interface IBadgeModel
{
    const string SIZE_SMALL = 'sm';
    const string SIZE_LARGE = 'lg';

    public function getLabel(): string;

    public function getColor(): string;

    public function getSize(): string;
}
