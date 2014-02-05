<?php

namespace LogAgent\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

class AgentRunCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('agent:run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $runner = $this->getContainer()->get('logagent.manager.runner');
        $results = $runner->run();

        if (!$this->getOption('daemon')) {
            foreach ($results as $name => $result) {
                $output->writeln($result);
            }
        }
    }
}
