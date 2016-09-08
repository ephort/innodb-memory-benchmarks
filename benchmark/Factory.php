<?php

namespace Benchmark;

class Factory {
    
    /**
     * Construct requested class
     * 
     * @param object $db
     * @return \Benchmark\class
     * @throws Exception
     */
    public static function build(\mysqli $db)
    {
        $testType = $_SERVER['argv'][1];

        $subFactory = 'Benchmark\\' . ucfirst($testType) . '\\Factory';

        if (class_exists($subFactory)) {
            return $subFactory::build($db);
        }

        throw new \Exception('Unsupported test');
    }
    
}