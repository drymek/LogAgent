<?php

namespace LogAgent\Collector;

class DiskSpace implements CollectorInterface
{
    public function getAlias()
    {
        return 'disk_space';
    }

    public function configure(array $config)
    {
        var_dump($config);
    }

    public function execute()
    {
        return 'xxx';
    }
}
