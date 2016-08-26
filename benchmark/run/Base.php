<?php

namespace Benchmark\Run;

class Base extends \Benchmark\Base {

    /**
     * Constructor
     * 
     * @param \mysqli $mysqli
     * @param string $schema
     * @param string $table
     * @param int $iterations
     * @param string $runType Any method of the classes Mixed, Read and Write.
     */
    public function __construct(\mysqli $mysqli, $schema, $table, $iterations, $runType = 'readRandom')
    {
        $this->db         = $mysqli;
        $this->database   = $schema;
        $this->table      = $table;
        $this->iterations = $iterations;
        $this->runType    = $runType;
    }
    
    /**
     * Run tests
     */
    public function run()
    {
        if (!method_exists($this, $this->runType))
            throw new \Exception('Unsupported run type');

        for ($i = 0; $i < $this->iterations; $i++) {
            $this->$runType();
        }

    }
    
}