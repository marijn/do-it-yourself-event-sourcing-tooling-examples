<?php declare(strict_types=1);

namespace Acme;

function canonical_to_fully_qualified(string $canonical): string {
    return str_replace('.', '\\', $canonical);
}
