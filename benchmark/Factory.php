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
        self::updateConfigFromArguments();
        
        $subFactory = 'Benchmark\\' . ucfirst(Config::$testType) . '\\Factory';

        if (class_exists($subFactory)) {
            return $subFactory::build($db);
        }

        throw new \Exception('Unsupported test');
    }
    
    /**
     * Update config from command-line arguments
     * 
     * @return void
     */
    protected static function updateConfigFromArguments()
    {
        Config::$testType   = $_SERVER['argv'][1];
        Config::$engine     = $_SERVER['argv'][2];
        
        if ('run' === Config::$testType || 'prepare' === Config::$testType) {
            Config::$iterations = $_SERVER['argv'][3];
        }
        
        if ('run' === Config::$testType) {
            Config::$test    = $_SERVER['argv'][4];
            Config::$runType = $_SERVER['argv'][5];
        }
    }
    
}