<?php declare(strict_types=1);

namespace Infra\EventSourcing\CodeGeneration;

use Infra\EventSourcing\CodeGeneration\CodeGenerator;
use Stringy\Stringy;
use function Acme\Infra\EventSourcing\canonical_to_fully_qualified;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CommandHandlersCodeGenerator implements CodeGenerator {

    function generate (array $dsl): string {
        $namespaces = [];

        foreach ($dsl as $canonicalModuleName => $moduleSpecification)
        {
            $module = canonical_to_fully_qualified($canonicalModuleName);
            $commandHandlers = [];

            foreach ($moduleSpecification['commands'] as $commandClassName => $commandSpecification)
            {
                if (array_key_exists('results in', $commandSpecification))
                {
                    $handlerName = Stringy::create($commandClassName)->prepend('Handles_');
                    $event = canonical_to_fully_qualified($commandSpecification['results in']);
                    $eventArguments = [];

                    foreach ($commandSpecification['attributes'] as $attribute => $attributeSpecification)
                    {
                        $eventArguments[] = <<<PHP
\$command->{$attribute}(),
PHP;
                    }

                    $eventArgumentCode = rtrim(implode(PHP_EOL, $eventArguments), ',');
                    $commandHandlers[] = <<<PHP
final class {$handlerName} extends \Acme\Infra\EventSourcing\EventRecordingCommandHandler {
    function handle({$commandClassName} \$command): void {
        \$this->recordThat(
            new \\{$event}(
                {$eventArgumentCode}
            )
        );
    }
}
PHP;
                }
            }

            $commandHandlersCode = implode(PHP_EOL, $commandHandlers);
            $namespaces[] = <<<PHP
namespace {$module} {
{$commandHandlersCode}
}
PHP;
        }

        $code = implode(PHP_EOL, $namespaces);

        return <<<PHP
<?php declare(strict_types=1);

/**
 * WARNING! This file has been generated.
 *
 * Modify by changing the underlying DSL. Convention stipulates that the file is called after the type of code generator.
 * Are you a first-timer? Ask someone to help you. Have a nice day :-)
 *
 * @see \Infra\EventSourcing\CodeGeneration\CommandHandlersCodeGenerator
 */

{$code}

PHP;
    }
}
