<?php

namespace spec\Application\Helper\Tools;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Helper\Tools\Date');
    }

    function it_is_get_date_time()
    {
        $oNewDate = $this->getDateTime()->shouldReturnAnInstanceOf(new \DateTime());
    }

    function it_is_get_date_time_from_string()
    {
        $this->getDateTimeFromString('2015-11-11 15:08:00')->shouldReturnAnInstanceOf(new \DateTime());
    }

    function it_is_add_days_to_date_time()
    {
        $oDateTime = new \DateTime('2015-01-01 05:20:00');
        $oDateTimeEnd = new \DateTime('2015-01-06 05:20:00');
        $oNewDate = $this->addDaysToDateTime($oDateTime, 4)->shouldReturnAnInstanceOf(new \DateTime());
        $this->countDateDaysAbsDiff($oNewDate, $oDateTimeEnd)->shouldReturn(1);
    }

    function it_is_count_date_days_abs_diff()
    {
        $oDateTimeStart = new \DateTime('2015-01-02 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-01 05:20:00');
        $this->countDateDaysAbsDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(1);
        $this->countDateDaysAbsDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(-1);
        $this->countDateDaysAbsDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(3);

        $oDateTimeStart = new \DateTime('2015-01-01 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-02 05:20:00');
        $this->countDateDaysAbsDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(1);
        $this->countDateDaysAbsDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(-1);
        $this->countDateDaysAbsDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(3);
    }

    function it_is_count_date_days_diff()
    {
        $oDateTimeStart = new \DateTime('2015-01-02 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-01 05:20:00');
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(1);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(0);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(2);

        $oDateTimeStart = new \DateTime('2015-01-01 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-02 05:20:00');
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(-1);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(0);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(1);

        $oDateTimeStart = new \DateTime('2015-01-15 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-10 05:20:00');
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(5);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(-5);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(35);

        $oDateTimeStart = new \DateTime('2015-01-11 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-20 05:20:00');
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(-9);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(9);
        $this->countDateDaysDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(31);
    }

    function it_is_count_date_hours_diff()
    {
        $oDateTimeStart = new \DateTime('2015-01-01 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-01 05:20:00');
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(5);
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(6);
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(4);

        $oDateTimeStart = new \DateTime('2015-01-01 11:20:00');
        $oDateTimeEnd = new \DateTime('2015-01-01 05:20:00');
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(6);
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(7);
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(5);

        $oDateTimeStart = new \DateTime('2015-01-01 12:20:00');
        $oDateTimeEnd = new \DateTime('2015-01-01 05:20:00');
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(7);
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(8);
        $this->countDateHoursDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(6);
    }

    function it_is_count_date_minutes_diff()
    {
        $oDateTimeStart = new \DateTime('2015-01-01 11:15:00');
        $oDateTimeEnd = new \DateTime('2015-01-01 11:20:00');

        $this->countDateMinutesDiff($oDateTimeStart, $oDateTimeEnd)->shouldReturn(5);
        $this->countDateMinutesDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(6);
        $this->countDateMinutesDiff($oDateTimeStart, $oDateTimeEnd)->shouldNotReturn(4);
    }
}
