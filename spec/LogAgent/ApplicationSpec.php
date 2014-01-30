<?php

namespace spec\LogAgent;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApplicationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Symfony\Component\Console\Application');
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('LogAgent');
    }

    function it_has_a_version()
    {
        $this->getVersion()->shouldReturn('1.0');
    }
}
