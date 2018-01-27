#!/usr/bin/env php
<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Acme\CodeGeneration\CodeGenerator;
use Symfony\Component\Yaml\Yaml;

if (count($argv) < 2 || count($argv) > 2)
{
    echo "\033[0;31mInvalid usage of script.\033[0m\n";
    echo "\n";
    echo "You have to provide:\n";
    echo "\n";
    echo " - dsl (e.g. example-dsl.yaml)\n";
    echo "\n";
    echo "Example:\n";
    echo "\n";
    echo " $\033[0;32m bin/generate-code.php src/Acme/OnlineShop/messages.yaml\033[0m\n";
    echo "\n";
    die(1);
}

$cg = new CodeGenerator;
$dslUri = $argv[1];
$dslFile = @file_get_contents($dslUri);
$dsl = Yaml::parse($dslFile);

echo $cg->generate($dsl), PHP_EOL;
