#!/usr/bin/env php
<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Acme\Infra\EventSourcing\CodeGeneration\CodeGeneratorFactory;
use Symfony\Component\Yaml\Yaml;

const errorOnInvalidUsage = 1;
const errorOnFileReadingProblems = 2;

$stdout = fopen('php://stdout', 'w');
$stderr = fopen('php://stderr', 'w');

if (count($argv) < 2 || count($argv) > 2)
{
    fwrite($stderr, "\033[0;31mInvalid usage of script.\033[0m\n");
    fwrite($stderr, "\n");
    fwrite($stderr, "You have to provide:\n");
    fwrite($stderr, "\n");
    fwrite($stderr, " - dsl (e.g. example-dsl.yaml)\n");
    fwrite($stderr, "\n");
    fwrite($stderr, "Example:\n");
    fwrite($stderr, "\n");
    fwrite($stderr, " $\033[0;32m bin/generate-code.php src/Acme/OnlineShop/messages.yaml\033[0m\n");
    fwrite($stderr, "\n");
    die(errorOnInvalidUsage);
}

$dslUri = $argv[1];
$generatorFactory = new CodeGeneratorFactory();
$cg = $generatorFactory->get();
$dslFile = @file_get_contents($dslUri);

if (false === $dslFile)
{
    fwrite($stderr, "\033[0;31mFile '{$dslUri}' could not be read.\033[0m\n");
    die(errorOnFileReadingProblems);
}

$dsl = Yaml::parse($dslFile);

fwrite($stdout, $cg->generate($dsl));
