<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 22.01.16
 * Time: 19:46
 */

namespace Application\Helper\Services;


use Zend\Mvc\Controller\AbstractActionController;

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