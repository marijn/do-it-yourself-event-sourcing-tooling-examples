<?php declare(strict_types=1);

namespace Infra\EventSourcing\CodeGeneration;

use Infra\EventSourcing\CodeGeneration\CodeGenerator;
use Infra\EventSourcing\CodeGeneration\CommandHandlersCodeGenerator;
use Infra\EventSourcing\CodeGeneration\MessagesCodeGenerator;
use InvalidArgumentException;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CodeGeneratorFactory {

    private $generators;

    function __construct () {
        $this->generators = [
            'messages' => new MessagesCodeGenerator,
            'handlers' => new CommandHandlersCodeGenerator,
        ];
    }

    function get (string $type): CodeGenerator {
        if ( ! array_key_exists($type, $this->generators))
        {
            $supportedGenerators = implode(', ', array_keys($this->generators));

            throw new InvalidArgumentException("Unknown generator. Supported generators: '{$supportedGenerators}'");
        }

        return $this->generators[$type];
    }
}
