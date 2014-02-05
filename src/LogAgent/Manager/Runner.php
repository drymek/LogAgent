<?php

namespace LogAgent\Manager;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Runner
{
    private $config;
    private $container;
    private $factory;

    public function run()
    {
        $collectors = $this->factory->build();
        $results = array();

        foreach ($collectors as $name => $collector) {
            $results[$name] = $collector->execute();
        }

        return $results;
    }

    public function setCollectorFactory(CollectorFactory $factory)
    {
        $this->factory = $factory;
    }
}
