<?php

namespace App\Twig\Components;

use App\Builder\MenuBuilder;
use App\Enum\Color;
use App\Model\BadgeModel;
use App\Model\IBadgeModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use Tree\Node\NodeInterface;

#[AsTwigComponent]
final class Sidebar
{
    public function __construct(
        private readonly KernelInterface $kernel,
        private readonly RouterInterface $router,
    )
    {
    }

    public function buildMenu(Request $request): NodeInterface
    {
        $menuBuilder = MenuBuilder::create($request);
        $this->addMainMenuItems($menuBuilder);

        if ($this->kernel->getEnvironment() === 'dev') {
            $this->addDevMenuItems($menuBuilder);
        }

        return $menuBuilder->build();
    }

    private function addMainMenuItems(MenuBuilder $menuBuilder): void
    {
        $menuBuilder->addMenuItem(
            identifier: 'home',
            label: 'Homepage',
            route: $this->router->generate('main'),
            icon: 'tabler:home'
        );
    }

    private function addDevMenuItems(MenuBuilder $menuBuilder): void
    {
        $menuBuilder
            ->addDropdownMenuItem(
                identifier: 'dev-menu',
                label: 'Devtools',
                route: '#',
                icon: 'tabler:settings'
            )
            ->addMenuItem(
                identifier: '_profiler',
                label: 'Profiler',
                route: $this->router->generate('_profiler_home'),
                icon: 'tabler:settings',
                badge: new BadgeModel(
                    label: 'DEV',
                    color: Color::RED_LT,
                    size: IBadgeModel::SIZE_SMALL
                )
            )
            ->addMenuItem(
                identifier: '_profiler_search',
                label: 'Profiler Search',
                route: $this->router->generate('_profiler_search'),
                icon: 'tabler:search',
                badge: new BadgeModel(
                    label: 'DEV',
                    color: Color::RED_LT,
                    size: IBadgeModel::SIZE_SMALL
                )
            )
            ->addMenuItem(
                identifier: '_profiler_phpinfo',
                label: 'PHP Info',
                route: $this->router->generate('_profiler_phpinfo'),
                icon: 'tabler:info-circle',
                badge: new BadgeModel(
                    label: 'DEV',
                    color: Color::RED_LT,
                    size: IBadgeModel::SIZE_SMALL
                )
            )
            ->addMenuItem(
                identifier: '_profiler_xdebug',
                label: 'Xdebug Info',
                route: $this->router->generate('_profiler_xdebug'),
                icon: 'tabler:bug',
                badge: new BadgeModel(
                    label: 'DEV',
                    color: Color::RED_LT,
                    size: IBadgeModel::SIZE_SMALL
                )
            );
    }
}
