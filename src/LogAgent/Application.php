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

    private $container;

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);

        $this->container = new ContainerBuilder();
        $loader = new YamlFileLoader($this->container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('commands.yml');
        $loader->load('services.yml');

        $this->initializeCommands();
    }

    private function initializeCommands()
    {
        $commands = $this->container->findTaggedServiceIds('logagent.command');

        foreach ($commands as $id => $attributes) {
            $command = $this->container->get($id);
            $this->add($command);
        }
    }

    public function getContainer()
    {
        return $this->container;
    }
}
