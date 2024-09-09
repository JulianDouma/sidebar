<?php

declare(strict_types=1);

namespace App\Builder;

use App\Model\BadgeModel;
use App\Model\MenuItemModel;
use Symfony\Component\HttpFoundation\Request;
use Tree\Builder\NodeBuilder;
use Tree\Node\NodeInterface;

class MenuBuilder extends NodeBuilder
{
    private string $currentUri;

    public function __construct(string $currentUri, ?NodeInterface $node = null)
    {
        parent::__construct($node);
        $this->currentUri = $currentUri;
    }

    public static function create(Request $request, ?NodeInterface $node = null): self
    {
        return new self($request->getRequestUri(), $node);
    }

    public function addMenuItem(
        string $identifier,
        string $label,
        string $route,
        ?string $icon,
        ?BadgeModel $badge = null
    ): self {
        $this->leaf(
            new MenuItemModel(
                identifier: $identifier,
                label: $label,
                url: $route,
                currentUri: $this->currentUri,
                icon: $icon,
                badge: $badge
            )
        );
        return $this;
    }

    public function addDropdownMenuItem(
        string $identifier,
        string $label,
        string $route,
        ?string $icon,
        ?BadgeModel $badge = null
    ): self {
        $this->tree(
            new MenuItemModel(
                identifier: $identifier,
                label: $label,
                url: $route,
                currentUri: $this->currentUri,
                icon: $icon,
                badge: $badge
            )
        );
        return $this;
    }

    public function build(): NodeInterface
    {
        return $this->getNode()->root();
    }
}
