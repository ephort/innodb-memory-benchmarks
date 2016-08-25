#!/usr/bin/php -q
<?php

require __DIR__ . '/vendor/autoload.php';

$database = \Benchmark\Database::get();

try {
    \Benchmark\Factory::build($database)->run();
} catch (\Exception $e) {
    print 'Error: ' . $e->getMessage();
}