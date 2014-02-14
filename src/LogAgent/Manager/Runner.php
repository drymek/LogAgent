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
            $result = $collector->execute();
            $name = $collector->getAlias();

            $results[$name] = $result;
            $this->log($name, $result);
        }

        return $results;
    }

    public function setCollectorsFactory(Collectors $factory)
    {
        $this->factory = $factory;
    }

    public function setLogger($logger) 
    {
        $this->logger = $logger;
    }

    private function log($name, $result) 
    {
        $this->logger->err($name . '|'. $result);
    }
}
