<?php

namespace Benchmark\Run\Engine;

class Mixed extends \Benchmark\Run\Base {
    
    /**
     * Do random read query
     * 
     * @return boolean
     */
    public function random()
    {
        if (mt_rand() % 2) {
            $model = new \Benchmark\Run\Engine\Read($this->db, $this->database, $this->table, $this->iterations, $this->runType);
        } else {
            $model = new \Benchmark\Run\Engine\Write($this->db, $this->database, $this->table, $this->iterations, $this->runType);
        }

        return $model->random();
    }
    
}