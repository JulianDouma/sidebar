<?php

namespace App\Twig\Components;

use App\Builder\MenuBuilder;
use App\Enum\Color;
use App\Model\BadgeModel;
use App\Model\BadgeModelInterface;
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

    public function getMenu(Request $request): NodeInterface
    {
        $menuBuilder = new MenuBuilder($request);

        $menuBuilder
            ->addMenuItem('home', 'Homepage', $this->router->generate('main'), 'tabler:home');

        if ($this->kernel->getEnvironment() === 'dev') {
            $menuBuilder
                ->addDropdownMenuItem('dev-menu',
                    label: 'Devtools',
                    route: '#',
                    icon: 'tabler:settings'
                )
                ->addMenuItem(
                    '_profiler',
                    label: 'Profiler',
                    route: $this->router->generate('_profiler_home'),
                    icon: 'tabler:settings',
                    badge: new BadgeModel('DEV', Color::RED_LT, BadgeModelInterface::SIZE_SMALL)
                )
                ->addMenuItem(
                    '_profiler_search',
                    label: 'Profiler Search',
                    route: $this->router->generate('_profiler_search'),
                    icon: 'tabler:search',
                    badge: new BadgeModel('DEV', Color::RED_LT, BadgeModelInterface::SIZE_SMALL)
                )
                ->addMenuItem(
                    '_profiler_phpinfo',
                    label: 'PHP Info',
                    route: $this->router->generate('_profiler_phpinfo'),
                    icon: 'tabler:info-circle',
                    badge: new BadgeModel('DEV', Color::RED_LT, BadgeModelInterface::SIZE_SMALL)
                )
                ->addMenuItem(
                    '_profiler_xdebug',
                    label: 'Xdebug Info',
                    route: $this->router->generate('_profiler_xdebug'),
                    icon: 'tabler:bug',
                    badge: new BadgeModel('DEV', Color::RED_LT, BadgeModelInterface::SIZE_SMALL)
                )
            ;
        }

        return $menuBuilder->build();
    }
}
