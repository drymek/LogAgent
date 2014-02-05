<?php

namespace LogAgent\Factory;

use Symfony\Component\DependencyInjection\ContainerInterface;
use LogAgent\Exception\ConfigurationException;
use LogAgent\Collector\CollectorInterface;

class Collectors
{
    private $config;
    private $container;
    private $availableCollectors;

    public function __construct(array $config, ContainerInterface $container)
    {
        $this->config = $config;
        $this->container = $container;
        $this->configuredCollectors = array();
    }

    public function build()
    {
        $collectors = array();

        foreach ($this->config as $name => $entry) {
            $collector = $this->findCollectorByName($name);

            $collector->configure($entry);
            $collectors[] = $collector;
        }

        return $collectors;
    }

    private function findCollectorByName($name)
    {
        if (null === $this->availableCollectors) {
            $this->availableCollectors = $this->container->findTaggedServiceIds('logagent.collector');
        }

        foreach ($this->availableCollectors as $id => $attributes) {
            $collector = $this->container->get($id);

            if (!$collector instanceof CollectorInterface) {
                throw new ConfigurationException(sprintf('Collector for "%s" is not instance of CollectorInterface', $name));
            }

            if ($name === $collector->getAlias()) {
                return $collector;
            }
        }
    }
}
