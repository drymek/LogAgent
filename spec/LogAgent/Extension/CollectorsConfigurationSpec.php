<?php

namespace spec\LogAgent\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigurationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LogAgent\Extension\Configuration');
        $this->shouldHaveType('Symfony\Component\Config\Definition\ConfigurationInterface');
    }
}
