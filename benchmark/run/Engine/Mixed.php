<?php

namespace Benchmark\Run;

class Mixed extends \Benchmark\Run\Base {
    
    /**
     * Do random read query
     * 
     * @return boolean
     */
    public function random()
    {
        if (rand() % 2) {
            $model = new \Benchmark\Run\Engine\Read($this->db);
        } else {
            $model = new \Benchmark\Run\Engine\Write($this->db);
        }

        return $this->random();
    }
    
}