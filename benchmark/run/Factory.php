<?php

namespace Benchmark\Run;

class Factory {
    
    /**
     * Construct requested class
     * 
     * @param \mysqli $db
     * @return \Benchmark\class
     * @throws \Exception
     */
    public static function build(\mysqli $db)
    {
        $engine     = $_SERVER['argv'][2];
        $iterations = $_SERVER['argv'][3];
        $test       = $_SERVER['argv'][4];
        $runType    = $_SERVER['argv'][5];

        $schema = \Benchmark\Config::${$engine}['schema'];
        $table  = \Benchmark\Config::${$engine}['table'];
        
        $class = 'Benchmark\\Run\\Engine\\' . ucfirst($test);

        if (class_exists($class)) {
            return new $class($db, $schema, $table, $iterations, $runType);
        }

        // otherwise we fail
        throw new \Exception('Unsupported format');
    }
    
}