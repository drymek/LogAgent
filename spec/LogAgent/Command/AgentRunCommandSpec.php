<?php

namespace spec\LogAgent\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

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
}
