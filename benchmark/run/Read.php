<?php

namespace Benchmark\Run;

class Read extends \Benchmark\Base {
    
    /**
     * Do random read query
     * 
     * @return boolean
     */
    public function readRandom()
    {
        if (rand() % 2)
            return $this->readSingleRow();
        else
            return $this->readAllRows();
    }
    
    /**
     * Read random row
     * 
     * @return boolean
     */
    public function readSingleRow()
    {
        return $this->db->query('SELECT * FROM ' . $this->database . '.' . $this->table . ' LIMIT 1 ORDER BY RAND()');
    }
    
    /**
     * Read all rows
     * 
     * @return boolean
     */
    public function readAllRows()
    {
        return $this->db->query('SELECT * FROM ' . $this->database . '.' . $this->table);
    }
    
}