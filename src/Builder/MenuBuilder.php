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
    public function __construct( private readonly Request $request, ?NodeInterface $node = null)
    {
        parent::__construct($node);
    }

    public function addMenuItem(string $identifier, string $label, string $route, ?string $icon, ?BadgeModel $badge = null): self
    {
        $this->leaf(new MenuItemModel($this->request, $identifier, $label, $route, false, $icon, $badge));

        return $this;
    }

    public function addDropdownMenuItem(string $identifier, string $label, string $route, ?string $icon, ?BadgeModel $badge = null): self
    {
        $this->tree(new MenuItemModel($this->request, $identifier, $label, $route, false, $icon, $badge));

        return $this;
    }

    public function build(): NodeInterface
    {
        return $this->getNode()->root();
    }
}
