<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing\CodeGeneration;

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
