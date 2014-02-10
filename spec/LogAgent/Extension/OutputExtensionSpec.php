<?php

namespace spec\LogAgent\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OutputExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LogAgent\Extension\OutputExtension');
    }
}
