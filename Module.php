<?php
namespace ContentCore;

use ContentCore\Entity\User;
use ContentCore\Model\UserTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{   
    
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig()
    {
        // ...
        return array(
        'contentuser_create_user_form' => function($sm) {
            $form = new Form\CreateUser();
            return $form;
        },
    );
    }
    
}
