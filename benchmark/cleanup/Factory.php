<?php

namespace Benchmark\Cleanup;

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
        $engine = $_SERVER['argv'][2];

        $schema = \Benchmark\Config::${$engine}['schema'];
        $table  = \Benchmark\Config::${$engine}['table'];
        
        $class = 'Benchmark\\Cleanup\\Tables';

        if (class_exists($class)) {
            return new $class($db, $schema, $table);
        }

        // otherwise we fail
        throw new \Exception('Unsupported format');
    }
    
}