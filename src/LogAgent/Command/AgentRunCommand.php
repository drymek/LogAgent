<?php

namespace LogAgent\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;

class AgentRunCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('agent:run')
            ->addOption('daemon', null, InputOption::VALUE_NONE, 'Deamon mode (no output)')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $runner = $this->getContainer()->get('logagent.manager.runner');
        $results = $runner->run();

        if (!$input->getOption('daemon')) {
            foreach ($results as $name => $result) {
                $output->writeln(sprintf('<info>%s</info> %s', $name, $result));
            }
        }
    }
}
