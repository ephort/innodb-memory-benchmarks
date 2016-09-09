# innodb-memory-benchmarks

## About

Benchmark tool of InnoDB and Memory MySQL engines as a PHP CLI.

The purpose of this tool is to validate the results of other benchmark 
tools, e.g. sysbench.

## Installation

1. Check out the project
2. Set up vendor folder and autoloading:

	php composer.phar update

## Usage

1. Start preparation, using the "prepare" method.
2. Run the tests, using the "run" method.

## Usage examples

	php benchmark.php prepare innodb 100000
	php benchmark.php prepare memory 100000
	php benchmark.php run innodb 100000 mixed random
	php benchmark.php run memory 100000 mixed random

## Clean up

	php benchmark.php cleanup innodb
	php benchmark.php cleanup memory

## Test types

The 'run' method accepts different test types.

Each method in Benchmark\Run\Engine is supported:

* mixed random
* read random
* read singleRow
* read allRows
* write random
* write update
* write insert

## Remarks

To be able to run tests with a large number of rows, you might need to change 
the following MySQL configuration variables:

* increase 'max_allowed_packet' (the prefill method inserts all rows in one chunk)
* increase 'max_heap_table_size'
* increase 'tmp_table_size'

The read tests does not make searches (neither range searches or equality comparisions).
It picks random rows based on an `ORDER BY rand()` statement. Performance of search
and indexing is thus not tested using this tool.