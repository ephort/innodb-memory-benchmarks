<?php

namespace Benchmark\Prepare;

/**
 * Base class
 *
 * @author KJI
 */
class Base extends \Benchmark\Base {

    /**
     * Number of rows to prefill
     *
     * @var int
     */
    protected $rows = 0;

    /**
     * Constructor
     *
     * @param \mysqli $mysqli
     * @param string $schema
     * @param string $table
     * @param int $rows
     */
    public function __construct(\mysqli $mysqli, $schema, $table, $rows, $engine)
    {
        $this->db       = $mysqli;
        $this->database = $schema;
        $this->table    = $table;
        $this->rows     = $rows;
        $this->engine   = $engine;
    }

    /**
     * Run preparation methods
     * 
     * @param int $rows
     * @return void
     */
    public function run()
    {
        $this->create();
        $this->prefill();
    }

    public function create()
    {
        $this->db->query("CREATE DATABASE IF NOT EXISTS $this->database;") or $this->throwException($this->db->error);
        return $this->db->query("CREATE TABLE " . $this->database . "." . $this->table . "
            (
             id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
             k INT(10) UNSIGNED NOT NULL DEFAULT 0,
             v char(120) NOT NULL DEFAULT '',
             INDEX USING BTREE (k)
            ) ENGINE $this->engine") or $this->throwException($this->db->error);
    }

    public function prefill()
    {
        $query = str_repeat("INSERT INTO " . $this->database . "." . $this->table . " (k, v) VALUES(ROUND(rand()*100000), substring(MD5(rand()), 0, 120));", $this->rows);
        return $this->db->multi_query($query) or $this->throwException($this->db->error);
    }

}
