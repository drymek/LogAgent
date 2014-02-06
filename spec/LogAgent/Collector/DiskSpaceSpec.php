<?php

namespace spec\LogAgent\Collector;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Process;

class DiskSpaceSpec extends ObjectBehavior
{
    private $process;

    function let(ProcessBuilder $builder, Process $process)
    {
        $builder->setPrefix('df')->willReturn($builder);
        $builder->getProcess()->willReturn($process);
        $this->beConstructedWith($builder);

        $this->process = $process;
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LogAgent\Collector\CollectorInterface');
    }

    function it_has_alias()
    {
        $this->getAlias()->shouldReturn('disk_space');
    }

    function it_returns_disk_usage_in_string_format()
    {
        $data = 
            "System plików                       1K-bl    użyte  dostępne %uż. zamont. na\n".
            "/dev/sda1                        40636768  1819200  36730300   5% /\n";

        $this->process->run()->shouldBeCalled();
        $this->process->isSuccessful()->willReturn(true);
        $this->process->getOutput()->willReturn($data);

        $this->configure(array('devices'=>array('/dev/sda1')));    
        $this->execute()->shouldReturn("/dev/sda1|1819200|36730300|/\n");
    }
}
