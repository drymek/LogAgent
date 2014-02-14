<?php

namespace LogAgent\Extension;

use Symfony\Bundle\MonologBundle\DependencyInjection\MonologExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\LoggerChannelPass;
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\DebugHandlerPass;
use Symfony\Bundle\MonologBundle\DependencyInjection\Compiler\AddProcessorsPass;

class OutputExtension extends MonologExtension
{
    public function getAlias()
    {
        return 'output';
    }

    public function getConfiguration(array $config, \Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        return new OutputConfiguration();
    }

    public function build(ContainerBuilder $container) {
        $container->addCompilerPass($channelPass = new LoggerChannelPass());
        $container->addCompilerPass(new DebugHandlerPass($channelPass));
        $container->addCompilerPass(new AddProcessorsPass());
    }
}
