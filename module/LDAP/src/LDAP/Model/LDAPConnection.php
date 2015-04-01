<?php
/**
 * Created by PhpStorm.
 * User: Aitor
 * Date: 1/4/15
 * Time: 23:53
 */

namespace LDAP\Model;

use Zend\Ldap\Exception\LdapException;
use Zend\Ldap\Ldap;

class LDAPConnection {

    /** @var Ldap ldap */
    protected $ldap;

    /* ************************ */
    /*       Constructor        */
    /* ************************ */
    function __construct($config) {
        $this->ldap = new Ldap($config);
    }

    /* ************************ */
    /*         Methods          */
    /* ************************ */

    /**
     * @param $user
     *
     * @throws LdapException
     */
    public function ldapCanonicalAccountName($user) {
        $cAName = $this->ldap->getCanonicalAccountName($user,Ldap::ACCTNAME_FORM_DN);

        //Show Canonical account Name
        $this->showVar($cAName);
    }

    /**
     * @param $user
     * @param $passwd
     */
    public function ldapAuthentication($user, $passwd) {
        try {
            $user = $this->ldap->bind($user, $passwd);

            //Show Login State
            $this->showVar($user->getLastError());

            //Show Data
            $this->showVar($user->getBoundUser());

        } catch (LdapException $e) {
            echo "Acces denied, message: " . $e->getMessage();
        }
    }

    /**
     * @param String $user
     */
    public function getLdapUser($user) {
        $hm = $this->ldap->getEntry('CN='.$user.',CN=Users,DC=amoreno,DC=cat ');
        $this->showVar($hm);
    }

    /**
     * @param $var
     */
    private function showVar($var) {
        if (is_array($var)) {
            echo "<pre>";
            var_dump($var);
            echo "</pre>";
        } else {
            echo $var;
        }

        echo "<br/>";
    }

}