<?php

namespace Ela\GlhfBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class GlhfExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('ela.glhf');

        if(isset($config['entities']))
        {
            $definition->setArgument(0, $config['entities']['source_dir']);
            $definition->setArgument(1, $config['entities']['target_dir']);
        }
    }

    public function getAlias(): ?string
    {
        return 'glhf';
    }

    public function getNamespace(): ?string
    {
        return 'glhf';
    }
}