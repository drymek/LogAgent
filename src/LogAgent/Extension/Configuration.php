<?php

namespace LogAgent\Extension;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('collectors');

        $rootNode
            ->children()
                ->scalarNode('cpu')
                ->end()
            ->end()
            ;
        return $treeBuilder;
    }
}
