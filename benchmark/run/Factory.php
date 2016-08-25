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
        $iterations = $_SERVER['argv'][3];
        $test       = $_SERVER['argv'][4];

        $class = 'Benchmark\\Run\\Engine\\' . ucfirst($test);

        if (class_exists($class)) {
            return new $class($db, $iterations, $test);
        }

        // otherwise we fail
        throw new Exception('Unsupported format');
    }
    
}