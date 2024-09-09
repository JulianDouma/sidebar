<?php

declare(strict_types=1);

namespace App\Model;

use Override;
use Tree\Node\NodeTrait;

class MenuItemModel implements IMenuItemModel
{
    use NodeTrait;

    public function __construct(
        private readonly string      $identifier,
        private readonly string      $label,
        private readonly string      $url,
        private readonly string      $currentUri,
        private bool                 $active = false,
        private readonly ?string     $icon = null,
        private readonly ?BadgeModel $badge = null
    )
    {
        $this->setValue($this->identifier);
        $this->active = $this->currentUri === $this->url;
    }

    #[Override] public function getLabel(): string
    {
        return $this->label;
    }

    #[\Override] public function getUrl(): string
    {
        return $this->url;
    }

    #[\Override] public function getIcon(): ?string
    {
        return $this->icon;
    }

    #[\Override] public function hasIcon(): bool
    {
        return $this->icon !== null;
    }

    #[\Override] public function isActive(): bool
    {
        return $this->active;
    }

    #[\Override] public function getBadge(): ?BadgeModel
    {
        return $this->badge;
    }

    #[\Override] public function hasBadge(): bool
    {
        return $this->badge !== null;
    }
}
