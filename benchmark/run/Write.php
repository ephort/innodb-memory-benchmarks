<?php

namespace Benchmark\Run;

class Write extends \Benchmark\Base {

    /**
     * Do random write query
     * 
     * @return boolean
     */
    public function writeRandom()
    {
        if (rand() % 2)
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
        return $this->db->query('UPDATE ' . $this->database . '.' . $this->table . ' SET v=rand() LIMIT 1 ORDER BY RAND()');
    }
    
    /**
     * Insert random data
     * 
     * @return boolean
     */
    public function insert()
    {
        return $this->db->query('INSERT INTO ' . $this->database . '.' . $this->table . ' (k,v) VALUES(rand(), rand())');
    }
    
}