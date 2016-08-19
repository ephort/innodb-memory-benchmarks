<?php

namespace Benchmark;

class Factory {
    
    /**
     * Construct requested class
     * 
     * @return \Benchmark\class
     * @throws Exception
     */
    public static function build() {

        $engine   = $_SERVER['argv'][1];
        $testType = $_SERVER['argv'][2];
        $rows     = $_SERVER['argv'][3];

        $class = 'Benchmark\\' . $engine . '\\' . $testType;

        if (class_exists($class)) {
            return new $class(self::buildMysql());
        }

        // otherwise we fail
        throw new Exception('Unsupported format');
    }
    
    /**
     * Construct MySQLi object
     * 
     * @return mysqli
     */
    public static function buildMysql()
    {
        return new \mysqli($GLOBALS['config']['mysql']['host'], $GLOBALS['config']['mysql']['user'], $GLOBALS['config']['mysql']['pass']);
    }
    
}