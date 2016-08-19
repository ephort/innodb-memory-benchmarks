<?php

namespace Benchmark\Run;

class Engine extends \Benchmark\Base {
    
    public function run($type)
    {
        $this->$type();
    }
    
}