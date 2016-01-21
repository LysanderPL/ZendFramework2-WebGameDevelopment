<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\UsersTable\User;
use Doctrine\ORM\EntityManager;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        /**
         * @var $entityManager EntityManager
         */
        $entityManager = $this
            ->getServiceLocator()
            ->get('Doctrine\ORM\EntityManager');

//        $user = new User();
//        $user->setId(202);
//        $user->setName('Juljusz Słowacki');
        /**
         * @var $t User
         */
        $t = $entityManager->find('Application\Entity\UsersTable\User', 4);
        echo $t->getName();
//
//        $entityManager->persist($user);
//        $entityManager->flush();
//
//        echo $user->getId();

        return new ViewModel();
    }
}
