#!/usr/bin/env php
<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Acme\CodeGeneration\CodeGenerator;
use Symfony\Component\Yaml\Yaml;

const errorOnInvalidUsage = 1;
const errorOnFileReadingProblems = 2;

$stdout = fopen('php://stdout', 'w');

if (count($argv) < 2 || count($argv) > 2)
{
    fwrite($stdout, "\033[0;31mInvalid usage of script.\033[0m\n");
    fwrite($stdout, "\n");
    fwrite($stdout, "You have to provide:\n");
    fwrite($stdout, "\n");
    fwrite($stdout, " - dsl (e.g. example-dsl.yaml)\n");
    fwrite($stdout, "\n");
    fwrite($stdout, "Example:\n");
    fwrite($stdout, "\n");
    fwrite($stdout, " $\033[0;32m bin/generate-code.php src/Acme/OnlineShop/messages.yaml\033[0m\n");
    fwrite($stdout, "\n");
    die(errorOnInvalidUsage);
}

$cg = new CodeGenerator;
$dslUri = $argv[1];
$dslFile = @file_get_contents($dslUri);

if (false === $dslFile)
{
    fwrite($stdout, "\033[0;31mFile '{$dslUri}' could not be read.\033[0m\n");
    die(errorOnFileReadingProblems);
}

$dsl = Yaml::parse($dslFile);

fwrite($stdout, $cg->generate($dsl));
