<?php

declare(strict_types=1);

namespace App\Model;

use Tree\Node\NodeInterface;

interface MenuItemModelInterface extends NodeInterface
{
    public function getLabel(): string;

    public function getUrl(): string;

    public function getIcon(): ?string;

    public function hasIcon(): bool;

    public function isActive(): bool;

    public function hasBadge(): bool;

    public function getBadge(): ?BadgeModel;
}
