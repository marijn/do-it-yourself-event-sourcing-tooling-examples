<?php declare(strict_types=1);

function esc(string $input): string {
    return htmlspecialchars($input, ENT_QUOTES);
}

/**
 * Explicitly state that we do not want to escape the output.
 */
function raw(string $input): string {
    return $input;
}
