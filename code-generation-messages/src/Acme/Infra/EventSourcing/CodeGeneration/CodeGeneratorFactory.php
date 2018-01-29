<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing\CodeGeneration;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CodeGeneratorFactory {

    function get(): CodeGenerator {
        return new CodeGenerator;
    }
}
