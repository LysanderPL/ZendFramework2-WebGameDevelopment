<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 22.01.16
 * Time: 19:46
 */

namespace Library\Helper\Services;


use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class Controller
 * @package Application\Helper\Services
 */
class Controller extends AbstractActionController
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

}