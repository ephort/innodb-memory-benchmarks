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
     * @param \mysqli $mysqli
     * @param string $schema
     * @param string $table
     */
    public function __construct(\mysqli $mysqli, $schema, $table)
    {
        $this->db       = $mysqli;
        $this->database = $schema;
        $this->table    = $table;
    }
    
    /**
     * Throw exception function
     * 
     * @param string $message
     */
    public function throwException($message)
    {
        throw new \Exception($message);
    }
}