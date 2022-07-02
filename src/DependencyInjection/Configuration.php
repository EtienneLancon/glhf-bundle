<?php

namespace Ela\GlhfBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('glhf');

        $treeBuilder->getRootNode()
            ->children()
                ->arrayNode('entities')
                    ->children()
                        ->scalarNode('source_dir')->defaultValue('titi')->info('Directory in which entities relie.')->end()
                        ->scalarNode('target_dir')->defaultValue('tata')->info('Directory for created classes.')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}