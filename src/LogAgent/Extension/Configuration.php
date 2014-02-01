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
        $rootNode = $treeBuilder->root('collectors')->useAttributeAsKey('', false);

        $rootNode
            ->children()
                ->arrayNode('devices')
                    
                ->end()
                ->scalarNode('class')
                    ->isRequired()->cannotBeEmpty()
                ->end()
            ->end();
        ;
        return $treeBuilder;
    }
}
