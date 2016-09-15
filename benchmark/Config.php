<?php

namespace Benchmark;

class Config {
    
    static $mysql = array(
        'host'     => 'localhost',
        'user'     => 'root',
        'pass'     => '',
    );
    
    static $innodb = array(
        'schema'   => 'benchmark_innodb',
        'table'    => 'test',
    );
    
    static $memory = array(
        'schema'   => 'benchmark_memory',
        'table'    => 'test',
    );

    static $testType;
    
    static $engine;
    
    static $iterations;
    
    static $test;
    
    static $runType;
}