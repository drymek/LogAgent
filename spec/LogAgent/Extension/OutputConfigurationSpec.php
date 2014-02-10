<?php

namespace spec\LogAgent\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OutputConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LogAgent\Extension\OutputConfiguration');
    }
}
