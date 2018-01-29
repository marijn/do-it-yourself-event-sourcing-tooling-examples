<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing\CodeGeneration;

use InvalidArgumentException;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CodeGeneratorFactory {

    function get(string $type): CodeGenerator {
        switch ($type) {
            case 'messages': return new MessagesCodeGenerator;
            case 'handlers': return new CommandHandlersCodeGenerator;

            default: throw new InvalidArgumentException('Unknown generator');
        }
    }
}
