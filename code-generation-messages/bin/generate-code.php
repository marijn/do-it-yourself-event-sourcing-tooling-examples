#!/usr/bin/env php
<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Infra\EventSourcing\CodeGeneration\CodeGeneratorFactory;
use Symfony\Component\Yaml\Yaml;

const errorOnInvalidUsage = 1;
const errorOnFileReadingProblems = 2;
const errorOnUnexpectedResponse = 3;

$stdout = fopen('php://stdout', 'w');
$stderr = fopen('php://stderr', 'w');

if (count($argv) < 3 || count($argv) > 3)
{
    fwrite($stderr, "\033[0;31mInvalid usage of script.\033[0m\n");
    fwrite($stderr, "\n");
    fwrite($stderr, "You have to provide:\n");
    fwrite($stderr, "\n");
    fwrite($stderr, " - dsl (e.g. example-dsl.yaml)\n");
    fwrite($stderr, " - type (e.g. messages)\n");
    fwrite($stderr, "\n");
    fwrite($stderr, "Example:\n");
    fwrite($stderr, "\n");
    fwrite($stderr, " $\033[0;32m bin/generate-code.php src/Acme/OnlineShop/messages.yaml messages\033[0m\n");
    fwrite($stderr, "\n");
    die(errorOnInvalidUsage);
}

$dslUri = $argv[1];
$type = $argv[2];

try
{
    $generatorFactory = new CodeGeneratorFactory();
    $cg = $generatorFactory->get($type);
    $dslFile = @file_get_contents($dslUri);

    if (false === $dslFile)
    {
        fwrite($stderr, "\033[0;31mFile '{$dslUri}' could not be read.\033[0m\n");
        die(errorOnFileReadingProblems);
    }

    $dsl = Yaml::parse($dslFile);

    fwrite($stdout, $cg->generate($dsl));
}
catch (Throwable $error)
{
    fwrite($stderr, "\033[0;31mUnexpected error '{$error->getMessage()}'.\033[0m\n");
    die(errorOnUnexpectedResponse);
}
