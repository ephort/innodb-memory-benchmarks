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
        return new \mysqli($GLOBALS['config']['mysql']['host'], $GLOBALS['config']['mysql']['user'], $GLOBALS['config']['mysql']['pass']);
    }
    
}