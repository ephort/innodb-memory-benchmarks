<?php

namespace Benchmark;

/**
 * Base class
 * 
 * @author KJI
 */
class Base {
    
    /**
     * Database name
     * 
     * @var string
     */
    protected $database = false;
    
    /**
     * Table name
     * 
     * @var string
     */
    protected $table = false;
    
    /**
     * Database object
     * 
     * @var object
     */
    protected $db = false;
    
    /**
     * Constructor
     * 
     * @param mysqli $mysqli
     */
    public function __construct(\mysqli $mysqli)
    {
        $this->db = $mysqli;
    }
    
}