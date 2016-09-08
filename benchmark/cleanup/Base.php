<?php

namespace Benchmark\Cleanup;

/**
 * Base class
 * 
 * @author KJI
 */
class Base extends \Benchmark\Base {

    /**
     * Run preparation methods
     * 
     * @param int $rows
     * @return void
     */
    public function run()
    {
        $this->drop();
    }

}