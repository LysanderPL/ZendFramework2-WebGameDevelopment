<?php

namespace spec\Application\Helper\Services;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ControllerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Helper\Services\Controller');
    }
}
