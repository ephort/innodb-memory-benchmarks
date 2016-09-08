<?php

namespace Benchmark\Cleanup;

/**
 * Cleanup tables
 * 
 * @author KJI
 */
class Tables extends \Benchmark\Cleanup\Base {
    
    /**
     * Drop table
     * 
     * @return void
     */
    public function drop()
    {
        return $this->db->query("DROP TABLE IF EXISTS " . $this->database . "." . $this->table) or $this->throwException($this->db->error);
    }

}