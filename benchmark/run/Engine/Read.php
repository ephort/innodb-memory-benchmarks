<?php

namespace Benchmark\Run\Engine;

class Read extends \Benchmark\Run\Base {
    
    /**
     * Do random read query
     * 
     * @return boolean
     */
    public function random()
    {
        if (mt_rand() % 2)
            return $this->singleRow();
        else
            return $this->allRows();
    }
    
    /**
     * Read random row
     * 
     * @return boolean
     */
    public function singleRow()
    {
        return $this->db->query('SELECT * FROM ' . $this->database . '.' . $this->table . ' ORDER BY rand() LIMIT 1') or $this->throwException($this->db->error);
    }
    
    /**
     * Read all rows
     * 
     * @return boolean
     */
    public function allRows()
    {
        return $this->db->query('SELECT * FROM ' . $this->database . '.' . $this->table) or $this->throwException($this->db->error);
    }
    
}