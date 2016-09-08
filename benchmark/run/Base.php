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

        $start = microtime(true);
        
        echo PHP_EOL . PHP_EOL;
        echo '#######################################################' . PHP_EOL;
        echo '############### InnoDB-memory benchmark ###############' . PHP_EOL;
        echo '#######################################################' . PHP_EOL . PHP_EOL;

        echo 'Start: ' . date('Y-m-d H:i:s.u') . PHP_EOL;
        
        for ($i = 0; $i < $this->iterations; $i++) {
            echo "Iteration $i\t\t\t\t\r";
            $this->{$this->runType}();
        }
        
        echo "\n";
        
        echo 'Finished: ' . date('Y-m-d H:i:s.u') . PHP_EOL;
        echo 'Finished in: ' . (microtime(true) - $start) . ' seconds' . PHP_EOL;
        echo PHP_EOL . PHP_EOL;
        
    }
    
}