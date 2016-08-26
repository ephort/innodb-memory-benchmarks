<?php

namespace Benchmark\Prepare;

/**
 * Base class
 * 
 * @author KJI
 */
class Base extends \Benchmark\Base {
        
    /**
     * Number of rows to prefill
     * 
     * @var int
     */
    protected $rows = 0;

    /**
     * Constructor
     * 
     * @param \mysqli $mysqli
     * @param string $schema
     * @param string $table
     * @param int $rows
     */
    public function __construct(\mysqli $mysqli, $schema, $table, $rows)
    {
        $this->db       = $mysqli;
        $this->database = $schema;
        $this->table    = $table;
        $this->rows     = $rows;
    }
    
    /**
     * Run preparation methods
     * 
     * @param int $rows
     * @return void
     */
    public function run()
    {
        $this->rows = $rows;
        
        $this->create();
        $this->prefill();
    }

}