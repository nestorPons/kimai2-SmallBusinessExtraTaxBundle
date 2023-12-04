<?php

namespace KimaiPlugin\SmallBusinessExtraTaxBundle;

use App\Plugin\PluginInterface;
use KimaiPlugin\SmallBusinessExtraTaxBundle\DependencyInjection\Compiler\SmallBusinessDecoratorPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class SmallBusinessExtraTaxBundle extends Bundle implements PluginInterface
{
    /**
     * @param ContainerBuilder $container
     * @return void
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new SmallBusinessDecoratorPass());
    }
}
