<?php

namespace Benchmark\Prepare;

/**
 * Prepare test data for benchmarking
 * 
 * @author KJI
 */
interface PrepareInterface {
    
    /**
     * Create table
     * 
     * @return boolean
     */
    public function create();
    
    /**
     * Prefill table with data
     * 
     * @return boolean
     */
    public function prefill();
    
}