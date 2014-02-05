<?php

namespace LogAgent\Collector;

interface CollectorInterface
{
    public function getAlias();
    public function configure(array $config);
    public function execute();
}
