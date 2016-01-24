<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 17:51
 */

namespace Library\Helper\Tools\Resources\ResourcesAbstract;

use Library\Db\Entity\Planet;

/**
 * Class ResourcesAbstract
 * @package Library\Helper\Tools\Resources
 */
abstract class Resources implements ResourcesInterface
{
    /**
     * @var $_iResourceCount int
     */
    private $_iResourceCount;
    /**
     * @var $_iResourceMaxStorage int
     */
    private $_iResourceMaxStorage;
    /**
     * @var $_iResourcePerHour int
     */
    private $_iResourcePerHour;
    /**
     * @var $_oPlanetEntity Planet
     */
    private $_oPlanetEntity;
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $_oEntityManager;
    /**
     * @var TODO
     */
    protected $TIMESTAMP;

    /**
     * ResourcesInterface constructor.
     * @param Planet $oPlanetEntity
     * @param $oEntityManager
     * @throws \Exception
     */
    public function __construct(Planet $oPlanetEntity, $oEntityManager)
    {
        $this->setEntityManager($oEntityManager);
        $this->setPlanetDbInstance($oPlanetEntity);
        $this->TIMESTAMP = $_SERVER['REQUEST_TIME'];
    }

    /**
     * @param int $int
     */
    public function setResourceStorage(int $int)
    {
        $this->_iResourceCount = $int;
    }

    /**
     * @return int
     */
    public function getResourceCount()
    {
        return $this->_iResourceCount;
    }

    /**
     * @param int $int
     */
    public function setResourceMaxStorage(int $int)
    {
        $this->_iResourceMaxStorage = $int;
    }

    /**
     * @return int
     */
    public function getResourceMaxStorage()
    {
        return $this->_iResourceMaxStorage;
    }

    /**
     * @param int $int
     */
    public function setResourcePerHour(int $int)
    {
        $this->_iResourcePerHour = $int;
    }

    /**
     * @return int
     */
    public function getResourcePerHour()
    {
        return $this->_iResourcePerHour;
    }

    /**
     * @param Planet $oPlanetEntity
     * @return Planet
     */
    public function setPlanetDbInstance(Planet $oPlanetEntity)
    {
        if (!$this->_oPlanetEntity) {
            $this->_oPlanetEntity = $oPlanetEntity;
        }
    }

    /**
     * @return Planet
     * @throws \Exception
     */
    public function getPlanetDbInstance()
    {
        if (!$this->_oPlanetEntity) {
            throw new \Exception('_oPlanetEntity is not Defined');
        }
        return $this->_oPlanetEntity;
    }

    /**
     * @param \Doctrine\ORM\EntityManager $getEntityManager
     */
    public function setEntityManager($getEntityManager)
    {
        if (!$this->_oEntityManager) {
            $this->_oEntityManager = $getEntityManager;
        }
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     * @throws \Exception
     */
    public function getEntityManager()
    {
        if (!$this->_oEntityManager) {
            throw new \Exception('_oEntityManager is not Defined');
        }
        return $this->_oEntityManager;
    }

    /**
     * @return float
     * @throws \Exception
     */
    public final function countResource()
    {
        $timeDiff = intval($this->TIMESTAMP) - $this->getPlanetDbInstance()->getPlanetLastResourceUpdate();
        $this->getPlanetDbInstance()->setPlanetLastResourceUpdate(intval($this->TIMESTAMP));
        $countedResources = floatval($this->getResourceCount() + ($timeDiff * ($this->getResourcePerHour() / 2700)));

        return $countedResources;
    }

    /**
     * @throws \Exception
     */
    protected function __savePlanetState()
    {
        $this->getEntityManager()->persist($this->getPlanetDbInstance());
        $this->getEntityManager()->flush();
    }

}