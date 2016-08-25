<?php

/**
 * 
 * Config file
 * 
 */
$config = array(
    'mysql' => array(
        'host'     => 'localhost',
        'user'     => 'root',
        'pass'     => '',
    ),
    'innodb' => array(
        'schema'   => 'benchmark_innodb',
        'table'    => 'test',
    ),
    'memory' => array(
        'schema'   => 'benchmark_memory',
        'table'    => 'test',
    ),
);
