<?php

namespace Benchmark\Prepare\InnoDB;

class Prepare extends \Benchmark\Prepare\Base implements \Benchmark\Prepare\PrepareInterface {
    
    public function create()
    {

        $this->db->query("CREATE DATABASE IF NOT EXISTS $this->database;") or $this->throwException($this->db->error);

        return $this->db->query("CREATE TABLE " . $this->database . "." . $this->table . "
            (
             id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
             k INT(10) UNSIGNED NOT NULL DEFAULT 0, 
             v char(120) NOT NULL DEFAULT '',
             INDEX USING BTREE (k)
            ) ENGINE InnoDB") or $this->throwException($this->db->error);
    }
    
    public function prefill()
    {
        $values = implode(', ', array_fill(0, $this->rows, '(ROUND(rand()*100000), SUBSTRING(MD5(rand()), 1, 120))'));
        $query = "INSERT INTO " . $this->database . "." . $this->table . " (k, v) VALUES " . $values . ";";
        return $this->db->multi_query($query) or $this->throwException($this->db->error);
    }

}
