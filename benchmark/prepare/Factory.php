<?php

namespace Benchmark\Prepare;

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
        $rows   = $_SERVER['argv'][3];

        $schema = $GLOBALS[$engine]['schema'];
        $table  = $GLOBALS[$engine]['table'];
        
        $class = 'Benchmark\\Prepare\\' . $engine . '\\Prepare';

        if (class_exists($class)) {
            return new $class($db, $schema, $table, $rows);
        }

        // otherwise we fail
        throw new Exception('Unsupported format');
    }
    
}