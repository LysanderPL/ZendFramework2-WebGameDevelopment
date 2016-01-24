<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 17:24
 */

namespace Library\Helper\Tools\Resources\ResourcesAbstract;

use Library\Db\Entity\Planet;

/**
 * Interface ResourcesInterface
 * @package Library\Helper\Tools\Resources
 */
interface ResourcesInterface
{
    /**
     * ResourcesInterface constructor.
     * @param Planet $oPlanetEntity
     * @param $oEntityManager
     */
    public function __construct(Planet $oPlanetEntity, $oEntityManager);

    /**
     * @param int $int
     */
    public function setResourceStorage(int $int);

    /**
     * @param int $int
     */
    public function setResourceMaxStorage(int $int);

    /**
     * @param int $int
     */
    public function setResourcePerHour(int $int);

    /**
     * @param Planet $oPlanetEntity
     */
    public function setPlanetDbInstance(Planet $oPlanetEntity);

    /**
     * @return int
     */
    public function getResourceCount();

    /**
     * @return int
     */
    public function getResourceMaxStorage();

    /**
     * @return int
     */
    public function getResourcePerHour();

    /**
     * @return Planet
     */
    public function getPlanetDbInstance();

    /**
     * @return boolean
     */
    public function updateResourceOnPlanet();

}