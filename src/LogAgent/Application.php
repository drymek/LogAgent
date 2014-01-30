<?php

namespace LogAgent;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class Application extends BaseApplication
{
    const NAME = 'LogAgent';
    const VERSION = '1.0';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);

        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('commands.yml');

        $this->initializeCommands($container);
    }

    private function initializeCommands(ContainerBuilder $container)
    {
        $commands = $container->findTaggedServiceIds('logagent.command');

        foreach ($commands as $id => $attributes) {
            $command = $container->get($id);
            $this->add($command);
        }
    }
}
