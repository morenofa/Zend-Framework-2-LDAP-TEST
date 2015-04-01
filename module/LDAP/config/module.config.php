<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'LDAP\Controller\LDAP' => 'LDAP\Controller\LDAPController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'ldap' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/ldap[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'LDAP\Controller\LDAP',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'ldap' => __DIR__ . '/../view',
        ),
    ),

    'ldap' => array(
        'host'                   => 'amoreno.cat',
        'useStartTls'            => false,
        'username'               => 'test@amoreno.cat',
        'password'               => 'qcgdYUpr0T6G9rbt',
        'accountDomainName'      => 'amoreno.cat',
        'accountDomainNameShort' => 'AMORENO',
        'baseDn'                 => 'CN=Users,DC=amoreno,DC=cat',
    ),
);