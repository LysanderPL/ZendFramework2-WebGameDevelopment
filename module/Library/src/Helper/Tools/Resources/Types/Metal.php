<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 17:52
 */

namespace Library\Helper\Tools\Resources\Types;


use Doctrine\ORM\EntityManager;
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
    public function __construct(Planet $oPlanetEntity, EntityManager $oEntityManager)
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
        $iCounted = $this->countResource();
        var_dump($iCounted);
        if ($iCounted >= 1) {
            $iCounted = $this->getResourceCount() + $iCounted;
            if ($this->getResourceMaxStorage() >= $iCounted) {
                $this->getPlanetDbInstance()->setPlanetMetalStorage($iCounted);
            } else {
                $this->getPlanetDbInstance()->setPlanetMetalStorage($this->getResourceMaxStorage());
            }
            $this->getPlanetDbInstance()->setPlanetLastResourceUpdate($this->TIMESTAMP);
            $this->__savePlanetState();
        }
    }

    public function removeMetalFromStorage(int $minusValue)
    {
        if ($this->getResourceCount() >= $minusValue) {
            $this->setResourceStorage($this->getResourceCount() - $minusValue);
        }
    }
}