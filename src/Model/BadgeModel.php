<?php

declare(strict_types=1);

namespace App\Model;

use App\Enum\Color;
use InvalidArgumentException;

class BadgeModel implements IBadgeModel
{
    public final const array ALLOWED_SIZES = [
        self::SIZE_SMALL => self::SIZE_SMALL,
        self::SIZE_LARGE => self::SIZE_LARGE,
    ];

    public function __construct(
        private readonly string $label,
        private readonly Color  $color,
        private readonly string $size
    )
    {
        $this->validateSize($size);
    }

    #[\Override]
    public function getLabel(): string
    {
        return $this->label;
    }

    #[\Override]
    public function getColor(): string
    {
        return  $this->color->value;
    }

    #[\Override]
    public function getSize(): string
    {
        return $this->size;
    }

    private function validateSize(string $size): void
    {
        if (!in_array($size, self::ALLOWED_SIZES, true)) {
            throw new InvalidArgumentException("Invalid size: {$size}. Allowed sizes are: " . implode(', ', self::ALLOWED_SIZES));
        }
    }
}
