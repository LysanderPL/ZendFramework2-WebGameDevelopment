<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 18:15
 */

namespace Library\Helper\Tools\Resources;


use Doctrine\ORM\EntityManager;
use Library\Db\Entity\Planet;
use Library\Helper\Tools\Resources\Types\Metal;

/**
 * Class Factory
 * @package Library\Helper\Tools\Resources
 */
class Factory
{
    /**
     * @var EntityManager
     */
    private $_oEntityManager;
    /**
     * @var Planet
     */
    private $_oPlanetEntity;

    /**
     * Factory constructor.
     * @param Planet $oPlanetEntity
     * @param EntityManager $oEntityManager
     */
    public function __construct(Planet $oPlanetEntity,  $oEntityManager)
    {
        $this->_oEntityManager = $oEntityManager;
        $this->_oPlanetEntity = $oPlanetEntity;
    }

    /**
     * @return Metal
     */
    public function getMetalResource()
    {
        return new Metal($this->_oPlanetEntity, $this->_oEntityManager);
    }

}