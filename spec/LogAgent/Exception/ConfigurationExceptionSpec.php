<?php

namespace spec\LogAgent\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConfigurationExceptionSpec extends ObjectBehavior
{
    function it_is_an_exception()
    {
        $this->shouldHaveType('Exception');
    }
}
