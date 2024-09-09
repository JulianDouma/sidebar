<?php

namespace App\Twig\Components;

use App\Builder\MenuBuilder;
use App\Enum\Color;
use App\Model\BadgeModel;
use App\Model\BadgeModelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Tree\Node\NodeInterface;

#[AsTwigComponent]
final class Sidebar
{
    public function __construct(
        private readonly RouterInterface $router
    )
    {
    }


    public function getMenu(Request $request): NodeInterface
    {
        $menuBuilder = new MenuBuilder($request, $this->router);
        return $menuBuilder
            ->addMenuItem('homepage',
                label: 'Homepage',
                routeName: 'main',
                icon: 'tabler:home',

            )

            ->build();
    }
}
