<?php

namespace spec\LogAgent\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use LogAgent\Manager\Runner;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AgentRunCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Symfony\Component\Console\Command\Command');
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('agent:run');
    }

    function it_runs_manager(ContainerInterface $container, Runner $runner, InputInterface $input, OutputInterface $output)
    {
        $container->get('logagent.manager.runner')->willReturn($runner);
        $runner->run()->willReturn(array());
        $this->setContainer($container);
        $this->run($input, $output);
    }
}
