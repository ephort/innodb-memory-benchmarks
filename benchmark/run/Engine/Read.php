<?php

namespace Benchmark\Run;

class Read extends \Benchmark\Run\Base {
    
    /**
     * Do random read query
     * 
     * @return boolean
     */
    public function random()
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
    public function singleRow()
    {
        return $this->db->query('SELECT * FROM ' . $this->database . '.' . $this->table . ' LIMIT 1 ORDER BY RAND()');
    }
    
    /**
     * Read all rows
     * 
     * @return boolean
     */
    public function allRows()
    {
        return $this->db->query('SELECT * FROM ' . $this->database . '.' . $this->table);
    }
    
}