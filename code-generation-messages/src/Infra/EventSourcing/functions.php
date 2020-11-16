<?php declare(strict_types=1);

namespace Acme\Infra\EventSourcing;

function canonical_to_fully_qualified(string $canonical): string {
    return str_replace('.', '\\', $canonical);
}

function fully_qualified_class_name_to_canonical(string $fqcn): string {
    return str_replace('\\', '.', $fqcn);
}
