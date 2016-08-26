# innodb-memory-benchmarks

Benchmarks of InnoDB vs Memory MySQL engines as a PHP CLI.

## Usage

1. Start preparation, using the "prepare" method.
2. Run the tests, using the "run" method.

## Usage examples

	php benchmark.php prepare innodb 100000
	php benchmark.php prepare memory 100000
	php benchmark.php run innodb 100000 mixed random
	php benchmark.php run memory 100000 mixed random

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

## Unit tests

..