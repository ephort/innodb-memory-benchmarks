<?php

namespace Benchmark;

class Database {
    
    /**
     * Construct MySQLi object
     * 
     * @return mysqli
     */
    public static function get()
    {
        return new \mysqli(\Benchmark\Config::$mysql['host'], \Benchmark\Config::$mysql['user'], \Benchmark\Config::$mysql['pass']);
    }
    
}