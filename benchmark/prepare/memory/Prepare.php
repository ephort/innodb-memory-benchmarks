<?php

namespace Benchmark\Prepare\Memory;

class Prepare extends \Benchmark\Prepare\Base implements \Benchmark\Prepare\Prepare {
    
    public function create()
    {
        return $this->db->query("CREATE TABLE " . $this->database . "." . $this->table . "
            (
             id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
             k INT(10) UNSIGNED NOT NULL DEFAULT 0, 
             v char(120) NOT NULL DEFAULT '',
             INDEX USING BTREE (k)
            ) ENGINE Memory");
    }
    
    public function prefill()
    {
        $query = str_repeat("INSERT INTO " . $this->database . "." . $this->table . " (k, v) VALUES(ROUND(rand()*100000), substring(MD5(rand()), 0, 120));", $this->rows);
        return $this->db->multi_query($query);
    }

}