<?php

namespace LogAgent\Extension;

use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\Definition\Processor;

class CollectorsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new CollectorsConfiguration();
        $processor = new Processor();
        $config = $processor->processConfiguration($configuration, $configs);
        
        $container->setParameter('logagent.config', $config);
    }

    public function getAlias()
    {
        return 'collectors';
    }
}
