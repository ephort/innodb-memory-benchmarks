<?php

namespace Benchmark\Cleanup;

use Benchmark\Config;

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
        $schema = Config::${Config::$engine}['schema'];
        $table  = Config::${Config::$engine}['table'];
        
        $class = 'Benchmark\\Cleanup\\Tables';

        if (class_exists($class)) {
            return new $class($db, $schema, $table);
        }

        // otherwise we fail
        throw new \Exception('Unsupported format');
    }
    
}