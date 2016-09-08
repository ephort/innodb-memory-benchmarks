<?php

namespace Benchmark\Run\Engine;

class Write extends \Benchmark\Run\Base {

    /**
     * Do random write query
     * 
     * @return boolean
     */
    public function random()
    {
        if (mt_rand() % 2)
            return $this->update();
        else
            return $this->insert();
    }
    
    /**
     * Update random data
     * 
     * @return boolean
     */
    public function update()
    {
        return $this->db->query('UPDATE ' . $this->database . '.' . $this->table . ' SET v=rand() ORDER BY rand() LIMIT 1') or $this->throwException($this->db->error);
    }
    
    /**
     * Insert random data
     * 
     * @return boolean
     */
    public function insert()
    {
        return $this->db->query('INSERT INTO ' . $this->database . '.' . $this->table . ' (k,v) VALUES(rand(), rand())') or $this->throwException($this->db->error);
    }
    
}