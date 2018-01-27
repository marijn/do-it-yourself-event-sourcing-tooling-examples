<?php declare(strict_types=1);

namespace Acme\CodeGeneration;

/**
 * @copyright Marijn Huizendveld 2018. All rights reserved.
 */
final class CodeGenerator {

    function generate(array $dsl): string {
        $namespaces = [];

        foreach ($dsl as $module => $moduleSpecification)
        {
            $events = [];

            foreach ($moduleSpecification['events'] as $event => $eventSpecification)
            {
                $constructorParameters = [];
                $constructorAttributes = [];

                foreach ($eventSpecification['attributes'] as $attribute => $attributeSpecification)
                {
                    $constructorParameters[] = <<<PHP
string \${$attribute},
PHP;
                    $constructorAttributes[] = <<<PHP
\$this->{$attribute} = \${$attribute};
PHP;

                }

                $constructorParametersCode = rtrim(implode(PHP_EOL, $constructorParameters), ',');
                $constructorAttributesCode = implode(PHP_EOL, $constructorAttributes);
                $constructorCode = <<<PHP
function __construct(
    {$constructorParametersCode}
) {
    {$constructorAttributesCode}
}
PHP;

                $eventAttributes = [];

                foreach ($eventSpecification['attributes'] as $attribute => $attributeSpecification)
                {
                    $eventAttributes[] = <<<PHP
private \${$attribute};
function {$attribute}(): string { return \$this->{$attribute}; }
PHP;
                }

                $eventAttributesCode = implode(PHP_EOL, $eventAttributes);
                $events[] = <<<PHP
final class {$event} implements \Acme\Infra\EventSourcing\Event {
{$constructorCode}
{$eventAttributesCode}
}
PHP;
            }

            $eventCode = implode(PHP_EOL, $events);
            $namespaces[] = <<<PHP
namespace {$module} {
{$eventCode}
}
PHP;
        }

        $code = implode(PHP_EOL, $namespaces);

        return <<<PHP
<?php declare(strict_types=1);

{$code}
PHP;
    }
}
