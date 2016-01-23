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
    'db' => array(
        'driver' => 'Pdo',
        'dsn' => 'mysql:dbname=zend;host=localhost',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
            => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Zend\Log\Logger' => function($sm) {
        $logger = new Zend\Log\Logger;
        $writer = new Zend\Log\Writer\Stream('F:/logs/zend' . date('Y-m-d') . '-error.log');
        $filter = new Zend\Log\Filter\Priority(Zend\Log\Logger::INFO);
        $writer->addFilter($filter);
        $logger->addWriter($writer);
        return $logger;
    }
        ),
    ),
);