<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 17:52
 */

namespace Library\Helper\Tools\Resources\Types;


use Library\Db\Entity\Planet;
use Library\Helper\Tools\Resources\ResourcesAbstract\Resources;

/**
 * Class Metal
 * @package Library\Helper\Tools\Resources\Types
 */
class Metal extends Resources
{
    /**
     * Metal constructor.
     * @param Planet $oPlanetEntity
     * @param $oEntityManager
     */
    public function __construct(Planet $oPlanetEntity, $oEntityManager)
    {
        parent::__construct($oPlanetEntity, $oEntityManager);
        $this->setResourceStorage($this->getPlanetDbInstance()->getPlanetMetalStorage());
        $this->setResourceMaxStorage($this->getPlanetDbInstance()->getPlanetMetalMaxStorage());
        $this->setResourcePerHour($this->getPlanetDbInstance()->getPlanetMetalPerHour());

        $this->updateResourceOnPlanet();
    }

    /**
     * @return boolean
     */
    public function updateResourceOnPlanet()
    {
        $counted = $this->countResource();
        var_dump($counted);

        $this->getPlanetDbInstance()->setPlanetMetalStorage($counted);
        $this->__savePlanetState();
    }

    public function removeMetalFromStorage(int $minusValue)
    {
        if ($this->getResourceCount() >= $minusValue) {
            $this->setResourceStorage($this->getResourceCount() - $minusValue);
            return true;
        }
        return false;
    }
}