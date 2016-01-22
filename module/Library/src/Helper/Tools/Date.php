<?php
namespace Library\Helper\Tools;
/**
 * Class Data
 * @package Application\Helper\Tools
 */
class Date
{
    /**
     * @return \DateTime
     */
    public static function getDateTime()
    {
        return new \DateTime();
    }

    /**
     * @param String $sDateTime
     * @return \DateTime
     */
    public static function getDateTimeFromString(String $sDateTime)
    {
        return new \DateTime($sDateTime);
    }

    /**
     * @param \DateTime $oDateTime
     * @param int $iDaysToAdd
     * @return \DateTime
     */
    public static function addDaysToDateTime(\DateTime $oDateTime, int $iDaysToAdd)
    {
        $oDateTemp = clone($oDateTime);

        if ($iDaysToAdd > 0) {
            $oDateTemp->add(new \DateInterval('P' . $iDaysToAdd . 'D'));
        } else {
            $oDateTemp->sub(new \DateInterval('P' . abs($iDaysToAdd) . 'D'));
        }

        return $oDateTemp;
    }

    /**
     * @param \DateTime $oDateTimeStart
     * @param \DateTime $oDateTimeEnd
     * @return int
     */
    public static function countDateDaysAbsDiff(\DateTime $oDateTimeStart, \DateTime $oDateTimeEnd)
    {
        $oDateTimeStart->setTime(0, 0, 0);
        $oDateTimeEnd->setTime(0, 0, 0);
        return intval($oDateTimeStart->diff($oDateTimeEnd)->days);
    }

    /**
     * @param \DateTime $oDateTimeStart
     * @param \DateTime $oDateTimeEnd
     * @return int
     */
    public static function countDateDaysDiff(\DateTime $oDateTimeStart, \DateTime $oDateTimeEnd)
    {
        $oDateTimeStart->setTime(0, 0, 0);
        $oDateTimeEnd->setTime(0, 0, 0);
        $oDateDiff = $oDateTimeStart->diff($oDateTimeEnd);
        if ($oDateDiff->invert == 0) {
            return intval(-$oDateTimeStart->diff($oDateTimeEnd)->days);
        } else {
            return intval($oDateTimeStart->diff($oDateTimeEnd)->days);
        }
    }

    /**
     * @param \DateTime $oDateTimeStart
     * @param \DateTime $oDateTimeEnd
     * @return int
     */
    public static function countDateHoursDiff(\DateTime $oDateTimeStart, \DateTime $oDateTimeEnd)
    {
        $oDateDiff = $oDateTimeStart->diff($oDateTimeEnd);
        $hours = $oDateDiff->h;
        $hours = intval($hours + ($oDateDiff->days * 24));
        return $hours;
    }

    /**
     * @param \DateTime $oDateTimeStart
     * @param \DateTime $oDateTimeEnd
     * @return int
     */
    public static function countDateMinutesDiff(\DateTime $oDateTimeStart, \DateTime $oDateTimeEnd)
    {
        $oDateDiff = $oDateTimeStart->diff($oDateTimeEnd);

        $minute = $oDateDiff->i;
        $hours = $oDateDiff->h;
        $hours = $hours + ($oDateDiff->days * 24);
        return intval($minute + ($hours * 60));
    }
}
