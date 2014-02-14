<?php

namespace LogAgent\Collector;

use Symfony\Component\Process\ProcessBuilder;

class DiskSpace implements CollectorInterface
{
    private $builder;
    private $process;
    private $devices;

    public function __construct(ProcessBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function getAlias()
    {
        return 'disk_space';
    }

    public function configure(array $config)
    {
        $this->process = $this->builder->setPrefix('df')->getProcess();
        $this->devices = $config['devices'];
    }

    public function execute()
    {
        $this->process->run();

        if (!$this->process->isSuccessful()) {
            throw new \RuntimeException($this->process->getErrorOutput());
        }

        $output = $this->process->getOutput();

        return $this->parseOutput($output);
    }

    private function parseOutput($output)
    {
        $lines = explode("\n", $output);
        $result = '';

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            list ($device, $block, $used, $available, $percentage, $mount) = 
                preg_split('/\s+/', $line);

            if (in_array($device, $this->devices)) {
                $result .= implode('|', array($device, $used, $available, $mount)) . "\n";
            }
        }

        return $result;
    }
}
