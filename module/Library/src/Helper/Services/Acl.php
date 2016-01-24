<?php
/**
 * Created by PhpStorm.
 * User: mkruszewski
 * Date: 24.01.16
 * Time: 12:36
 */

namespace Library\Helper\Services;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Mvc\MvcEvent;
use Zend\Permissions\Acl\Acl as ZendAcl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Session\Container as SessionContainer;

class Acl extends AbstractPlugin
{
    protected $sesscontainer;

    private function getSessContainer()
    {
        if (!$this->sesscontainer) {
            $this->sesscontainer = new SessionContainer('AclAccess');
        }
        return $this->sesscontainer;
    }

    public function doAuthorization(MvcEvent $e)
    {
        $acl = new ZendAcl();
        $acl->deny();

        $acl->addRole(new Role('guest'));
        $acl->addRole(new Role('user'), 'guest');
        $acl->addRole(new Role('admin'), 'user');

        $acl->addResource('application');


        /**
         * TODO - create table with access data etc. ...
         */
        $acl->allow('user', 'application', 'index:index');
        $acl->allow('user', 'application', 'index:logout');
        $acl->allow('guest', 'application', 'index:login');


        $controller = $e->getTarget();
        $controllerClass = get_class($controller);
        $moduleName = strtolower(substr($controllerClass, 0, strpos($controllerClass, '\\')));
        $role = (!$this->getSessContainer()->role) ? 'guest' : $this->getSessContainer()->role;
        $routeMatch = $e->getRouteMatch();

        $actionName = strtolower($routeMatch->getParam('action', 'not-found')); // get the action name
        $controllerName = $routeMatch->getParam('controller', 'not-found');     // get the controller name

        $exploded = explode('\\', $controllerName);
        $controllerName = strtolower(array_pop($exploded));

        if (!$acl->isAllowed($role, $moduleName, $controllerName . ':' . $actionName)) {
            $router = $e->getRouter();
            $url = $router->assemble(array(), array('name' => 'application'));
            $response = $e->getResponse();
            $response->setStatusCode(302);
//TODO ..
            $response->getHeaders()->addHeaderLine('Location', $url . '/index/login');
            $e->stopPropagation();
        }


    }

}