<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array('/var/www2/module/Library/src/Db/Entity',  // Define path of entities
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Library\Db\Entity' => __NAMESPACE__ . '_driver'  // Define namespace of entities
                )
            )
        ),
        'authentication' => array(
            'orm_default' => array(
                'objectManager' => 'Doctrine\ORM\EntityManager',
                'identityClass' => '\Library\Db\Entity\User',
                'identityProperty' => 'login',
                'credentialProperty' => 'password',
                'credential_callable' => 'Library\Db\Entity\User::checkPassword'
                ),
        ),
    ),
);
