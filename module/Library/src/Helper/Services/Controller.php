<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 22.01.16
 * Time: 19:46
 */

namespace Library\Helper\Services;

use Library\Db\Entity\UserTable\User;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container as SessionContainer;

/**
 * Class Controller
 * @package Library\Helper\Services
 */
class Controller extends AbstractActionController
{
    /**
     * @var $authService \Zend\Authentication\AuthenticationService
     */
    private $_authService;
    /**
     * @var $sesscontainer \Zend\Session\Container
     */
    private $sesscontainer;

    /**
     * @return SessionContainer
     */
    protected function getAclSessionContainer()
    {
        if (!$this->sesscontainer) {
            $this->sesscontainer = new SessionContainer('AclAccess');
        }
        return $this->sesscontainer;
    }

    /**
     * @desc Returns a Entity Manager, by which we can access a Doctrine models...
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    /**
     * @return \Zend\Authentication\AuthenticationService
     */
    protected function getAuthService()
    {
        if (!$this->_authService) {
            $this->_authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        }

        return $this->_authService;
    }

    /**
     * @return \DoctrineModule\Authentication\Adapter\ObjectRepository
     */
    protected function getUserAdapter()
    {
        if (!$this->_authService) {
            $this->getAuthService();
        }

        return $this->_authService->getAdapter();
    }

    /**
     * @param User $oUserEntity
     */
    protected function writeSession(User $oUserEntity)
    {
        $this->getAuthService()->getStorage()->write($oUserEntity);
    }

    /**
     * @return User
     */
    protected function readSession()
    {
        return $this->getAuthService()->getStorage()->read();
    }


}