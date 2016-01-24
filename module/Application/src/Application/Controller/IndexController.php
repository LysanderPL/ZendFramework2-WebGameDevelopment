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
        $this->getUserAdapter()->setIdentity('Adam');
        $this->getUserAdapter()->setCredential(md5('hehe'));
        $authResult = $this->getAuthService()->authenticate();

        if ($authResult->isValid()) {
            $this->writeSession($authResult->getIdentity());
            $this->getAclSessionContainer()->role = 'user';
            return $this->redirect()->toRoute();
        } else {
        }

        return new ViewModel(array(
            'error' => 'Your authentication credentials are not valid',
        ));

    }

    public function logoutAction()
    {
        $this->getAuthService()->clearIdentity();
        $this->getAclSessionContainer()->role = 'guest';
        return $this->redirect()->toRoute();

    }


}
