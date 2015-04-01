<?php

namespace LDAP\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use LDAP\Model\LDAPConnection;

class LDAPController extends AbstractActionController
{
    /* ************************ */
    /*       Controllers        */
    /* ************************ */

    /**
     * @return ViewModel
     */
    public function indexAction() {
        return new ViewModel(
            array()
        );
    }

    /**
     * @return ViewModel
     */
    public function testAction() {

        $config = $this->getServiceLocator()->get('Config');

        $ldap = new LDAPConnection($config['ldap']);

        return new ViewModel(
            array(
                'ldap' => $ldap
            )
        );
    }



}