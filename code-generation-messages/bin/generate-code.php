#!/usr/bin/env php
<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Acme\CodeGeneration\CodeGenerator;
use Symfony\Component\Yaml\Yaml;

$cg = new CodeGenerator;
$dslUri = $argv[1];
$dslFile = file_get_contents($dslUri);
$dsl = Yaml::parse($dslFile);

echo $cg->generate($dsl), PHP_EOL;
