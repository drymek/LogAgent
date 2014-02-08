<?php

namespace spec\LogAgent\Factory;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use LogAgent\Collector\DiskSpace;

class CollectorsSpec extends ObjectBehavior
{
    function let(ContainerBuilder $container)
    {
        $config = array('collector' => array('data'));
        $this->beConstructedWith($config, $container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LogAgent\Factory\Collectors');
    }

    function it_should_be_able_to_build_collectors(DiskSpace $collector, ContainerBuilder $container)
    {
        $collector->getAlias()->willReturn('collector');
        $container->findTaggedServiceIds('logagent.collector')->willReturn(array('collector' => array()));
        $container->get('collector')->willReturn($collector);
        $collector->configure(array('data'))->shouldBeCalled();

        $this->build()->shouldReturn(array($collector));
    }

    function it_should_not_generate_any_errors_during_empty_configuration(ContainerBuilder $container)
    {
        $config = array();
        $this->beConstructedWith($config, $container);
        $container->findTaggedServiceIds('logagent.collector')->willReturn(array());
        $this->build()->shouldReturn(array());
    }
}
