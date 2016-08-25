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
     * @param int $rows
     */
    public function __construct(\mysqli $mysqli, $rows)
    {
        $this->db   = $mysqli;
        $this->rows = $rows;
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