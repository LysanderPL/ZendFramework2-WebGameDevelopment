<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 18:15
 */

namespace Library\Helper\Tools\Resources;


use Library\Db\Entity\Planet;
use Library\Helper\Tools\Resources\Types\Metal;

class Factory
{
    private $_oEntityManager;
    private $_oPlanetEntity;

    public function __construct(Planet $oPlanetEntity, $re)
    {
        $this->_oEntityManager = $re;
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