<?php

namespace spec\LogAgent\Manager;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RunnerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('LogAgent\Manager\Runner');
    }
}
