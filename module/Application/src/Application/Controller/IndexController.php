<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Library\Db\Entity\UserTable;
use Library\Helper\Services\Controller;
use Zend\View\Model\ViewModel;

class IndexController extends Controller
{

    public function indexAction()
    {
        return new ViewModel();
    }


    public function loginAction()
    {

        /**
         * @var $authService \Zend\Authentication\AuthenticationService
         * @var $adapter \DoctrineModule\Authentication\Adapter\ObjectRepository
         */

        // If you used another name for the authentication service, change it here
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');

        $adapter = $authService->getAdapter();
        $adapter->setIdentity('Adam');
        $adapter->setCredential(md5('hehe'));
        $authResult = $authService->authenticate();

        if ($authResult->isValid()) {
            echo 'logged<br>';
            echo $authResult->getIdentity()->getLogin();
//            return $this->redirect()->toRoute('home');
        } else {
            echo 'smfn is going wrong';
        }

        return new ViewModel(array(
            'error' => 'Your authentication credentials are not valid',
        ));

    }


}
