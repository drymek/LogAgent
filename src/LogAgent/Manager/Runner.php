<?php

namespace LogAgent\Manager;

use LogAgent\Factory\Collectors;

class Runner
{
    private $factory;

    public function run()
    {
        $collectors = $this->factory->build();
        $results = array();

        foreach ($collectors as $collector) {
            $results[$collector->getAlias()] = $collector->execute();
        }

        return $results;
    }

    public function setCollectorsFactory(Collectors $factory)
    {
        $this->factory = $factory;
    }
}
