<?php

namespace spec\LogAgent\Extension;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectorsExtensionSpec extends ObjectBehavior
{
    function it_is_extension()
    {
        $this->shouldHaveType('Symfony\\Component\\DependencyInjection\\Extension\\Extension');
    }

    function it_should_have_proper_alias()
    {
        $this->getAlias()->shouldReturn('collectors');
    }
}
